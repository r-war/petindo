      <!-- nav -->
      <div class="header-v4">
        <div class="header-nav">
          <div id="cssmenu">
            <ul>
              <li><a href="/">Home</a></li>
              <li>
                <a href="shop.html">Shop</a>
              </li>
              <li><a href="blog.html">Blog</a></li>
              <li><a href="about.html">About Us</a></li>
              <li><a href="contact.html">Contact Us</a></li>
            </ul>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <nav class="navbar ">
                  <div class="">
                    <div class="collapse navbar-collapse">
                      <ul class="nav navbar-nav">
                        <li class="li-lever-0">
                          <a class="active" href="/">
                            <span class="icon-home"></span>
                          </a>
                        </li>

                        @foreach ($menus as $menu)
                          <li class="li-lever-0">
                            <a href="{{$menu->url}}">{{$menu->name}}</a>
                          </li>
                        @endforeach
                      </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                  </div>
                  <!-- /.container-fluid -->
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end-nav -->