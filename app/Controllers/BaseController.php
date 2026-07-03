<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\ApplicationModel;
use App\Models\ApplicationUploadModel;
use App\Models\EducationModel;
use App\Models\ApplicationDocumentModel;

/**
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 *
 * Extend this class in any new controllers:
 * ```
 *     class Home extends BaseController
 * ```
 *
 * For security, be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */

    // protected $session;

    /**
     * @return void
     */
    protected $applicationStatus;
    protected $partBExists = false;
    protected $partCExists = false;
    protected $partDExists = false;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Load here all helpers you want to be available in your controllers that extend BaseController.
        // Caution: Do not put the this below the parent::initController() call below.
        // $this->helpers = ['form', 'url'];

        // Caution: Do not edit this line.
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.
        // $this->session = service('session');

        $session = session();

        $app_id  = $session->get('application_id');
        $user_id = $session->get('student_id');

        $applicationModel = new ApplicationModel();
        $uploadModel      = new ApplicationUploadModel();
        $educationModel   = new EducationModel();
        $documentModel    = new ApplicationDocumentModel();

        /*
        |-----------------------------------------------------------
        | If application_id not in session, find using user_id
        |-----------------------------------------------------------
        */
        if (!$app_id && $user_id) {

            $application = $applicationModel
                ->select('id')
                ->where('user_id', $user_id)
                ->first();

            if ($application) {
                $app_id = $application['id'];

                // store again in session
                $session->set('application_id', $app_id);
            }
        }

        /*
        |-----------------------------------------------------------
        | Check application parts
        |-----------------------------------------------------------
        */
        if ($app_id) {

            // Application Status
            $application = $applicationModel
                ->select('is_submitted')
                ->where('id', $app_id)
                ->first();

            if ($application) {
                $this->applicationStatus = $application['is_submitted'];
            }

            // PART B (Uploads)
            $partB = $uploadModel
                ->where('application_id', $app_id)
                ->first();

            if ($partB) {
                $this->partBExists = true;
            }

            // PART C (Education)
            $partC = $educationModel
                ->where('application_id', $app_id)
                ->first();

            if ($partC) {
                $this->partCExists = true;
            }

            // PART D (Documents)
            $partD = $documentModel
                ->where('application_id', $app_id)
                ->first();

            if ($partD) {
                $this->partDExists = true;
            }
        }

        /*
        |-----------------------------------------------------------
        | Share variables globally with all views
        |-----------------------------------------------------------
        */

        service('renderer')->setVar('applicationStatus', $this->applicationStatus);
        service('renderer')->setVar('partBExists', $this->partBExists);
        service('renderer')->setVar('partCExists', $this->partCExists);
        service('renderer')->setVar('partDExists', $this->partDExists);
    }
}
