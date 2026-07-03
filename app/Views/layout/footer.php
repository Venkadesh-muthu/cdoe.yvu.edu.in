    
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen">
  <div class="dot-loader">
    <span></span>
    <span></span>
    <span></span>
  </div>
</div>


  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.easing.1.3.js"></script>
  <script src="assets/js/jquery.waypoints.min.js"></script>
  <script src="assets/js/jquery.stellar.min.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>
  <script src="assets/js/jquery.magnific-popup.min.js"></script>
  <script src="assets/js/aos.js"></script>
  <script src="assets/js/jquery.animateNumber.min.js"></script>
  <script src="assets/js/bootstrap-datepicker.js"></script>
  <script src="assets/js/jquery.timepicker.min.js"></script>
  <script src="assets/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="assets/js/google-map.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Change language
function setLang(lang) {
    const value = lang === 'en' ? '/en/en' : '/en/' + lang;
    document.cookie = "googtrans=" + value + "; path=/";
    document.cookie = "googtrans=" + value + "; path=/; domain=" + location.hostname;
    location.reload();
}

// Detect selected language on load
function getCurrentLang() {
    const match = document.cookie.match(/googtrans=\/en\/(\w+)/);
    return match ? match[1] : 'en';
}

// Set dropdown default
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById('langSelect').value = getCurrentLang();
});

function googleTranslateElementInit() {
    new google.translate.TranslateElement(
        {
            pageLanguage: 'en',
            includedLanguages: 'en,hi,te',
            autoDisplay: false
        },
        'google_translate_element'
    );
}
</script>

<!-- <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> -->

 <script>
document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.navbar-nav .has-submenu > a')
    .forEach(function (link) {

      link.addEventListener('click', function (e) {
        if (window.innerWidth >= 992) return; // desktop ignore

        e.preventDefault();

        const submenu = this.nextElementSibling;
        if (!submenu) return;

        submenu.style.display =
          submenu.style.display === 'block' ? 'none' : 'block';
      });

    });
});
</script>

<script>
  document.querySelectorAll('.navbar-nav .has-submenu').forEach(function (item) {

    item.addEventListener('mouseenter', function () {
      if (window.innerWidth < 992) return;

      // reset direction first
      this.classList.remove('submenu-left');

      const submenu = this.querySelector(':scope > .sub-menu');
      if (!submenu) return;

      const rect = submenu.getBoundingClientRect();

      if (rect.right > window.innerWidth) {
        this.classList.add('submenu-left');
      }
    });

  });
</script>



    <!-- TOGGLE SCRIPT -->
<script>
  document.querySelectorAll('.toggle-btn').forEach(btn => {
    btn.addEventListener('click', function () {

      const selector = this.dataset.target;
      const items = document.querySelectorAll(selector);

      // items AFTER first 5
      const extraItems = Array.from(items).slice(5);

      const isExpanded = this.classList.contains('expanded');

      if (isExpanded) {
        // VIEW LESS → hide extra items
        extraItems.forEach(el => el.classList.add('d-none'));
        this.textContent = 'View More';
        this.classList.remove('expanded');
      } else {
        // VIEW MORE → show extra items
        extraItems.forEach(el => el.classList.remove('d-none'));
        this.textContent = 'View Less';
        this.classList.add('expanded');
      }

    });
  });
</script>
<!-- <script>
const apiUrl = "https://yvu.edu.in/yvu_admin_live/api/updates";
let allData = {};
let expandedTabs = {};

const config = {
  "Notifications": "notificationList",
  "Forms": "formsList",
  "Circulars": "circularsList",
  "Latest Info": "latestList",
  "Tenders": "tendersList",
  "Events": "eventsList",
  "Downloads": "downloadsList"
};

const typeMessage = {
  "Notifications": "Notifications",
  "Forms": "Forms",
  "Circulars": "Circulars",
  "Latest Info": "Latest Info",
  "Tenders": "Tenders",
  "Events": "Events",
  "Downloads": "Downloads"
};

async function loadUpdates() {
  const res = await fetch(apiUrl);
  const json = await res.json();

  allData = {};
  Object.keys(config).forEach(k => allData[k] = []);

  json.data.forEach(item => {
    if (config[item.type] && item.start_date && item.end_date) {
      allData[item.type].push(item);
    }
  });

  renderAll();
}

function renderAll() {
  Object.keys(config).forEach(type => {
    expandedTabs[type] = false;
    renderTab(type);
  });
}

function renderTab(type) {
  const listId = config[type];
  const btn = document.getElementById(listId.replace("List", "Btn"));
  const container = document.getElementById(listId);

  container.innerHTML = "";

  const data = allData[type];

  if (!data || data.length === 0) {
    container.innerHTML = `<p class="text-muted">No ${typeMessage[type]} available / ${typeMessage[type]} expired</p>`;
    btn.classList.add("d-none");
    return;
  }

  const visible = expandedTabs[type] ? data : data.slice(0, 5);

  visible.forEach(item => {
    const displayDate = item.created_at
      ? new Date(item.created_at).toLocaleDateString("en-GB")
      : "Date not available";

    container.innerHTML += `
      <div class="card border-0 shadow-sm mb-2">
        <div class="card-body">
          <strong>${item.heading}</strong>
          ${renderDocs(item.documents)}
          <small class="text-muted d-block mt-1">
            <b>Created:</b> ${displayDate}
          </small>
        </div>
      </div>
    `;
  });

  if (data.length > 5) {
    btn.classList.remove("d-none");
    btn.innerText = expandedTabs[type] ? "View Less" : "View More";
  } else {
    btn.classList.add("d-none");
  }
}

function renderDocs(docs) {
  if (!Array.isArray(docs) || docs.length === 0) return "<p class='text-muted'>No documents available</p>";
  return `
    <ul class="mt-1">
      ${docs.map(d =>
        `<li><a href="${d}" target="_blank">${decodeURIComponent(d.split("/").pop())}</a></li>`
      ).join("")}
    </ul>
  `;
}

function toggleView(type) {
  expandedTabs[type] = !expandedTabs[type];
  renderTab(type);
}

document.addEventListener("DOMContentLoaded", loadUpdates);
</script> -->


</html>