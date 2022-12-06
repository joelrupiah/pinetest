<template>
  <div id="admin-sidebar">
    <aside
      class="sidebar-left border-right bg-white shadow"
      id="leftSidebar"
      data-simplebar
    >
      <a
        href="#"
        class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3"
        data-toggle="toggle"
      >
        <i class="fe fe-x"><span class="sr-only"></span></i>
      </a>
      <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="w-100 mb-4 d-flex">
          <a
            class="navbar-brand mx-auto mt-2 flex-fill text-center"
            href="/admin"
          >
            <img src="/backend/assets/images/changed.png" alt="Pinecrest Logo" width="100" height="100">
          </a>
        </div>
        <ul class="navbar-nav flex-fill w-100 mb-2">
          <li class="nav-item w-100">
            <a class="nav-link" href="/admin">
              <i class="fe fe-home fe-16"></i>
              <span class="ml-3 item-text">Dashboard</span>
            </a>
          </li>
        </ul>
        <p class="text-muted nav-heading mt-4 mb-1">
          <span>Components</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
          <li class="nav-item dropdown">
            <a
              href="#content"
              data-toggle="collapse"
              aria-expanded="false"
              class="dropdown-toggle nav-link"
            >
              <i class="fe fe-folder fe-16"></i>
              <span class="ml-3 item-text">Content</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="content">
              <li class="nav-item">
                <router-link class="nav-link pl-3" :to="{ name: 'CategoryList' }">
                  <span class="ml-1 item-text">Categories</span>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link class="nav-link pl-3" :to="{ name: 'EnquiryList' }">
                  <span class="ml-1 item-text">Enquiries</span>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link class="nav-link pl-3" :to="{ name: 'BookingList' }">
                  <span class="ml-1 item-text">Bookings</span>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link class="nav-link pl-3" :to="{ name: 'ApplicationList' }">
                  <span class="ml-1 item-text">Applications</span>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link class="nav-link pl-3" :to="{ name: 'FeeRequests' }">
                  <span class="ml-1 item-text">Fee Requests</span>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link class="nav-link pl-3" :to="{ name: 'GradeList' }">
                  <span class="ml-1 item-text">Grade</span>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link
                  class="nav-link pl-3"
                  :to="{ name: 'GalleryList' }"
                >
                  <span class="ml-1 item-text">Gallery</span>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link
                  class="nav-link pl-3"
                  :to="{ name: 'CarouselList' }"
                >
                  <span class="ml-1 item-text">Carousel</span>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link class="nav-link pl-3" :to="{ name: 'ChooseList' }">
                  <span class="ml-1 item-text">Choose Us</span>
                </router-link>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a
              href="#pages"
              data-toggle="collapse"
              aria-expanded="false"
              class="dropdown-toggle nav-link"
            >
              <i class="fe fe-file fe-16"></i>
              <span class="ml-3 item-text">Pages</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="pages">
              <li class="nav-item">
                <router-link class="nav-link pl-3" :to="{ name: 'EventList' }">
                  <span class="ml-1 item-text">Events</span>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link class="nav-link pl-3" :to="{ name: 'FaqList' }">
                  <span class="ml-1 item-text">Faqs</span>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link
                  class="nav-link pl-3"
                  :to="{ name: 'CreatedFaqList' }"
                >
                  <span class="ml-1 item-text">Created Faqs</span>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link
                  class="nav-link pl-3"
                  :to="{ name: 'AdminAboutUsList' }"
                >
                  <span class="ml-1 item-text">About Us</span>
                </router-link>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a
              href="#admins"
              data-toggle="collapse"
              aria-expanded="false"
              class="dropdown-toggle nav-link"
            >
              <i class="fe fe-users fe-16"></i>
              <span class="ml-3 item-text">Admin</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="admins">
              <li class="nav-item">
                <router-link class="nav-link pl-3" :to="{ name: 'RoleList' }">
                  <span class="ml-1 item-text">Roles</span>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link
                  class="nav-link pl-3"
                  :to="{ name: 'PermissionList' }"
                >
                  <span class="ml-1 item-text">Permissions</span>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link class="nav-link pl-3" :to="{ name: 'AdminList' }">
                  <span class="ml-1 item-text">Admins</span>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link class="nav-link pl-3" :to="{ name: 'AdminTrash' }">
                  <span class="ml-1 item-text">Admin Trash</span>
                </router-link>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a
              href="#sitesettings"
              data-toggle="collapse"
              aria-expanded="false"
              class="dropdown-toggle nav-link"
            >
              <i class="fe fe-settings fe-16"></i>
              <span class="ml-3 item-text">Site Settings</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="sitesettings">
              <li class="nav-item">
                <router-link
                  class="nav-link pl-3"
                  :to="{ name: 'SiteSettingsList' }"
                >
                  <span class="ml-1 item-text">Site Settings List</span>
                </router-link>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a
              href="#emailings"
              data-toggle="collapse"
              aria-expanded="false"
              class="dropdown-toggle nav-link"
            >
              <i class="fe fe-mail fe-16"></i>
              <span class="ml-3 item-text">Emailing</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="emailings">
              <li class="nav-item">
                <router-link
                  class="nav-link pl-3"
                  :to="{ name: 'ParentsBulkEmail' }"
                >
                  <span class="ml-1 item-text">Parents Bulk Email</span>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link
                  class="nav-link pl-3"
                  :to="{ name: 'TeachersBulkEmail' }"
                >
                  <span class="ml-1 item-text">Teachers Bulk Email</span>
                </router-link>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </aside>
  </div>
</template>

<script>
export default {
  name: "AdminSidebar",
};
</script>
