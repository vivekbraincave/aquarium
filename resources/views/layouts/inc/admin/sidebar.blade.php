            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title" key="t-menu">Menu</li>

                            <li>
                                <a href="{{ route('dashboard') }}" class="waves-effect">
                                    <i class="bx bx-home-circle"></i>
                                    <span key="t-dashboards">Dashboards</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-layout"></i>
                                    <span key="t-layouts">Managae User</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">
                                    
                                    <li>
                                        <a href="{{ route('admin.users.create') }}" class="" key="t-vertical">Add User</a>
                                    </li>

                                    <li>
                                        <a href="{{ route('admin.users.index') }}" class="" key="t-horizontal">View Users</a>
                                    </li>                                    

                                    <li>
                                        <a href="{{ route('admin.roles.index') }}" class="" key="t-horizontal">Roles</a>
                                    </li>
                                </ul>
                            </li>
                            
                            <li>
                                <a href="{{ route('admin.faqs.index') }}" class="waves-effect">
                                    <i class='bx bx-help-circle'></i>
                                    <span key="t-layouts">FAQs</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('admin.brands.index') }}" class="waves-effect">
                                    <i class='bx bx-layer'></i>
                                    <span key="t-layouts">Brands</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('admin.gallery.index') }}" class="waves-effect">
                                    <i class='bx bx-image-alt'></i>
                                    <span key="t-layouts">Gallery</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('admin.contacts.index') }}" class="waves-effect">
                                    <i class='bx bxs-contact'></i>
                                    <span key="t-layouts">Contacts</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('admin.outlets.index') }}" class="waves-effect">
                                    <i class='bx bx-store-alt'></i>
                                    <span key="t-layouts">outlets</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('admin.settings.index') }}" class="waves-effect">
                                    <i class="bx bx-cog"></i>
                                    <span key="t-layouts">Settings</span>
                                </a>
                            </li>

                        </ul>

                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title" key="t-menu">Manage Pages</li>

                            <li>
                                <a href="{{ route('admin.pages.index') }}" class="waves-effect">
                                    <i class="bx bx-home-circle"></i>
                                    <span key="t-dashboards">Home Page Banner</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('admin.pages.small-gallery') }}" class="waves-effect">
                                    <i class='bx bxs-image'></i>
                                    <span key="t-dashboards">Small Gallery Images</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('admin.pages.manage-about') }}" class="waves-effect">
                                    <i class='bx bx-user'></i>
                                    <span key="t-dashboards">About Us Page</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('admin.pages.all-banner') }}" class="waves-effect">
                                    <i class='bx bxs-landscape' ></i>
                                    <span key="t-dashboards">Manage Pages Banner</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->