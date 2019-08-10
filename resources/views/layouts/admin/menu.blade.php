<div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class="{{ (Route::currentRouteName() == 'admin.dashboard') ? "active" : "" }}"><a href="{{ route('admin.dashboard') }}"><i class="la la-home"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
          </li>
        @if(Auth::guard('admin')->user()->level === 100)

          <li class=" navigation-header"><span data-i18n="nav.category.shop">Shop</span><i class="undefined ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Shop"></i>
          </li>
        <li class=" nav-item"><a href="#"><i class="la la-th-large"></i><span class="menu-title" data-i18n="nav.products.main">Products</span></a>
            <ul class="menu-content">
              <li class="{{ (Route::currentRouteName() == 'products.create') ? "active" : "" }}"><a class="menu-item" href="{{ route('products.create') }}" data-i18n="nav.products.create">Add new product</a>
              </li>
              <li class="{{ (Route::currentRouteName() == 'products.index') ? "active" : "" }}"><a class="menu-item" href="{{ route('products.index') }}" data-i18n="nav.products.view">View all products</a>
              </li>
            </ul>
          </li>

          <li class=" nav-item"><a href="#"><i class="la la-list"></i><span class="menu-title" data-i18n="nav.category.main">Categories</span></a>
            <ul class="menu-content">
              <li class="{{ (Route::currentRouteName() == 'categories.index') ? "active" : "" }}"><a class="menu-item" href="{{ route('categories.index') }}" data-i18n="nav.category.view">Category</a>
              </li>
              <li class="{{ (Route::currentRouteName() == 'subcategories.index') ? "active" : "" }}"><a class="menu-item" href="{{ route('subcategories.index') }}" data-i18n="nav.subcategory.view">Sub-Category</a>
              </li>
            </ul>
          </li>

          <li class=" nav-item {{ (Route::currentRouteName() == 'sizes.index') ? "active" : "" }}"><a class="menu-item" href="{{ route('sizes.index') }}"><i class="la la-credit-card"></i><span class="menu-title" data-i18n="">Sizes</span></a>
          </li>
          <li class=" nav-item {{ (Route::currentRouteName() == 'orders.show') ? "active" : "" }}"><a href="{{ route('orders.show') }}"><i class="la la-check-circle-o"></i><span class="menu-title" data-i18n="">Orders</span></a>
          </li>
          @endif
          @if(Auth::guard('admin')->user()->level === 500)
            <li class=" nav-item {{ (Route::currentRouteName() == 'vendoors') ? "active" : "" }}"><a href="{{ route('vendoors') }}"><i class="ft-users"></i><span class="menu-title" data-i18n="">Vendors</span></a>
            </li>
            <li class=" nav-item {{ (Route::currentRouteName() == 'orders.show') ? "active" : "" }}"><a href="{{ route('orders.show') }}"><i class="ft-package"></i><span class="menu-title" data-i18n="">Orders</span></a>
          </li>
          <li class=" nav-item {{ (Route::currentRouteName() == 'slider.create') ? "active" : "" }}"><a href="{{ route('slider.create') }}"><i class="ft-image"></i><span class="menu-title" data-i18n="">Image slider</span></a>
          </li>
          <li class=" nav-item {{ (Route::currentRouteName() == 'settings.index') ? "active" : "" }}"><a href="{{ route('settings.index') }}"><i class="ft-settings"></i><span class="menu-title" data-i18n="">Settings</span></a>
          </li>
          @endif
          {{-- <li class=" navigation-header"><span data-i18n="nav.category.ui">User Interface</span><i class="undefined ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="User Interface"></i>
          </li>
          <li class=" nav-item"><a href="#"><i class="la la-server"></i><span class="menu-title" data-i18n="nav.components.main">Components</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="component-alerts.html" data-i18n="nav.components.component_alerts">Alerts</a>
              </li>
              <li><a class="menu-item" href="component-callout.html" data-i18n="nav.components.component_callout">Callout</a>
              </li>
              <li><a class="menu-item" href="#" data-i18n="nav.components.components_buttons.main">Buttons</a>
                <ul class="menu-content">
                  <li><a class="menu-item" href="component-buttons-basic.html" data-i18n="nav.components.components_buttons.component_buttons_basic">Basic Buttons</a>
                  </li>
                  <li><a class="menu-item" href="component-buttons-extended.html" data-i18n="nav.components.components_buttons.component_buttons_extended">Extended Buttons</a>
                  </li>
                </ul>
              </li>
              <li><a class="menu-item" href="component-carousel.html" data-i18n="nav.components.component_carousel">Carousel</a>
              </li>
              <li><a class="menu-item" href="component-collapse.html" data-i18n="nav.components.component_collapse">Collapse</a>
              </li>
              <li><a class="menu-item" href="component-dropdowns.html" data-i18n="nav.components.component_dropdowns">Dropdowns</a>
              </li>
              <li><a class="menu-item" href="component-list-group.html" data-i18n="nav.components.component_list_group">List Group</a>
              </li>
              <li><a class="menu-item" href="component-modals.html" data-i18n="nav.components.component_modals">Modals</a>
              </li>
              <li><a class="menu-item" href="component-pagination.html" data-i18n="nav.components.component_pagination">Pagination</a>
              </li>
              <li><a class="menu-item" href="component-navs-component.html" data-i18n="nav.components.component_navs_component">Navs Component</a>
              </li>
              <li><a class="menu-item" href="component-tabs-component.html" data-i18n="nav.components.component_tabs_component">Tabs Component</a>
              </li>
              <li><a class="menu-item" href="component-pills-component.html" data-i18n="nav.components.component_pills_component">Pills Component</a>
              </li>
              <li><a class="menu-item" href="component-tooltips.html" data-i18n="nav.components.component_tooltips">Tooltips</a>
              </li>
              <li><a class="menu-item" href="component-popovers.html" data-i18n="nav.components.component_popovers">Popovers</a>
              </li>
              <li><a class="menu-item" href="component-badges.html" data-i18n="nav.components.component_badges">Badges</a>
              </li>
              <li><a class="menu-item" href="component-pill-badges.html">Pill Badges</a>
              </li>
              <li><a class="menu-item" href="component-progress.html" data-i18n="nav.components.component_progress">Progress</a>
              </li>
              <li><a class="menu-item" href="component-media-objects.html" data-i18n="nav.components.component_media_objects">Media Objects</a>
              </li>
              <li><a class="menu-item" href="component-scrollable.html" data-i18n="nav.components.component_scrollable">Scrollable</a>
              </li>
              <li><a class="menu-item" href="component-spinners.html" data-i18n="nav.components.component_spinners">Spinners</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="la la-unlock"></i><span class="menu-title" data-i18n="nav.pages.main">Authentication</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="login-with-bg-image.html">Login</a>
              </li>
              <li><a class="menu-item" href="register-with-bg-image.html">SignIn</a>
              </li>
              <li><a class="menu-item" href="recover-password.html">Forgot Password</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="la la-file-text"></i><span class="menu-title" data-i18n="nav.form_layouts.main">Form Layouts</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="form-layout-basic.html" data-i18n="nav.form_layouts.form_layout_basic">Basic Forms</a>
              </li>
              <li><a class="menu-item" href="form-layout-horizontal.html" data-i18n="nav.form_layouts.form_layout_horizontal">Horizontal Forms</a>
              </li>
              <li><a class="menu-item" href="form-layout-hidden-labels.html" data-i18n="nav.form_layouts.form_layout_hidden_labels">Hidden Labels</a>
              </li>
              <li><a class="menu-item" href="form-layout-form-actions.html" data-i18n="nav.form_layouts.form_layout_form_actions">Form Actions</a>
              </li>
              <li><a class="menu-item" href="form-layout-row-separator.html" data-i18n="nav.form_layouts.form_layout_row_separator">Row Separator</a>
              </li>
              <li><a class="menu-item" href="form-layout-bordered.html" data-i18n="nav.form_layouts.form_layout_bordered">Bordered</a>
              </li>
              <li><a class="menu-item" href="form-layout-striped-rows.html" data-i18n="nav.form_layouts.form_layout_striped_rows">Striped Rows</a>
              </li>
              <li><a class="menu-item" href="form-layout-striped-labels.html" data-i18n="nav.form_layouts.form_layout_striped_labels">Striped Labels</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="la la-paste"></i><span class="menu-title" data-i18n="nav.form_wizard.main">Form Wizard</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="form-wizard-circle-style.html" data-i18n="nav.form_wizard.form_wizard_circle_style">Circle Style</a>
              </li>
              <li><a class="menu-item" href="form-wizard-notification-style.html" data-i18n="nav.form_wizard.form_wizard_notification_style">Notification Style</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="la la-table"></i><span class="menu-title" data-i18n="nav.bootstrap_tables.main">Bootstrap Tables</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="table-basic.html" data-i18n="nav.bootstrap_tables.table_basic">Basic Tables</a>
              </li>
              <li><a class="menu-item" href="table-border.html" data-i18n="nav.bootstrap_tables.table_border">Table Border</a>
              </li>
              <li><a class="menu-item" href="table-sizing.html" data-i18n="nav.bootstrap_tables.table_sizing">Table Sizing</a>
              </li>
              <li><a class="menu-item" href="table-styling.html" data-i18n="nav.bootstrap_tables.table_styling">Table Styling</a>
              </li>
              <li><a class="menu-item" href="table-components.html" data-i18n="nav.bootstrap_tables.table_components">Table Components</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="la la-area-chart"></i><span class="menu-title" data-i18n="nav.chartjs.main">Chartjs</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="chartjs-line-charts.html" data-i18n="nav.chartjs.chartjs_line_charts">Line charts</a>
              </li>
              <li><a class="menu-item" href="chartjs-bar-charts.html" data-i18n="nav.chartjs.chartjs_bar_charts">Bar charts</a>
              </li>
              <li><a class="menu-item" href="chartjs-pie-doughnut-charts.html" data-i18n="nav.chartjs.chartjs_pie_doughnut_charts">Pie &amp; Doughnut charts</a>
              </li>
              <li><a class="menu-item" href="chartjs-scatter-charts.html" data-i18n="nav.chartjs.chartjs_scatter_charts">Scatter charts</a>
              </li>
              <li><a class="menu-item" href="chartjs-polar-radar-charts.html" data-i18n="nav.chartjs.chartjs_polar_radar_charts">Polar &amp; Radar charts</a>
              </li>
              <li><a class="menu-item" href="chartjs-advance-charts.html" data-i18n="nav.chartjs.chartjs_advance_charts">Advance charts</a>
              </li>
            </ul>
          </li> --}}
        </ul>
      </div>