  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer py-5">
      <div class="container">
          <div class="row">
          </div>
          @if (!auth()->user() || \Request::is('static-sign-up'))
              <div class="row">
                  <div class="col-8 mx-auto text-center mt-1">
                      <p>Copyright © 2021 - Yayasan Putra Pariwisata Indonesia</p>
                  </div>
              </div>
          @endif
      </div>
  </footer>
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
