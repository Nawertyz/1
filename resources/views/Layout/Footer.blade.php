@if (getDomain() == env('PARENT_SITE'))

</div>
					 
				</div>		
				<div class="mt-auto p-6 pt-0 text-center dark:text-white-dark ltr:sm:text-left rtl:sm:text-right">
					Copyright &copy; 2024 <a href="{{DataSite('facebook')}}" target="_blank" class="text-dark">{{DataSite('namesite')}}</a>. All rights reserved.
				</div>
			</div>
		</div>
        <script src="/Lam-Tilo/js/simple-datatables.js"></script>
		<script src="/Lam-Tilo/js/alpine-collaspe.min.js"></script>
        <script src="/Lam-Tilo/js/alpine-persist.min.js"></script>
        <script defer src="/Lam-Tilo/js/alpine-ui.min.js"></script>
        <script defer src="/Lam-Tilo/js/alpine-focus.min.js"></script>
        <script defer src="/Lam-Tilo/js/alpine.min.js"></script>
		<script src="/Lam-Tilo/js/highlight.min.js"></script>
        <script src="/Lam-Tilo/js/custom.js"></script>
  
 
    <script src="/assets9/vendor/libs/jquery/jquery.js"></script>
 
  <script src="/assets9/vendor/js/bootstrap.js"></script>
 
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="/assets9/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
 
 
  
 <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 
 
 <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="/assets/js/ptl1.js?time={{ time() }}"></script>
<script>
            document.addEventListener('alpine:init', () => {
                // main section
                Alpine.data('scrollToTop', () => ({
                    showTopButton: false,
                    init() {
                        window.onscroll = () => {
                            this.scrollFunction();
                        };
                    },

                    scrollFunction() {
                        if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                            this.showTopButton = true;
                        } else {
                            this.showTopButton = false;
                        }
                    },

                    goToTop() {
                        document.body.scrollTop = 0;
                        document.documentElement.scrollTop = 0;
                    },
                }));
				Alpine.data('sidebar', () => ({
                    init() {
                        const selector = document.querySelector('.sidebar ul a[href="' + window.location.pathname + '"]');
                        if (selector) {
                            selector.classList.add('active');
                            const ul = selector.closest('ul.sub-menu');
                            if (ul) {
                                let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                                if (ele) {
                                    ele = ele[0];
                                    setTimeout(() => {
                                        ele.click();
                                    });
                                }
                            }
                        }
                    },
                }));
                Alpine.data('header', () => ({
                    init() {
                        const selector = document.querySelector('ul.horizontal-menu a[href="' + window.location.pathname + '"]');
                        if (selector) {
                            selector.classList.add('active');
                            const ul = selector.closest('ul.sub-menu');
                            if (ul) {
                                let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                                if (ele) {
                                    ele = ele[0];
                                    setTimeout(() => {
                                        ele.classList.add('active');
                                    });
                                }
                            }
                        }
                    },
				}));
			});
		</script>
{!! DataSite('script_footer') !!}
@if (session('error'))
    <script>
          swa1('{{ session('error') }}','error')
    </script>
@endif
@if (session('success'))
    <script>
          swa1('{{ session('success') }}','success')
    </script>
@endif
@if (Auth::check())
    <script>
        callAjax('{{ route('user.action', 'level-user') }}', {
            _token: '{{ csrf_token() }}',
            user: '{{ Auth::user()->level }}'
        }).then(res => {
            if (res.status == 'success') {
             swa1(res.message,'success')
            }
        })
    </script>

@endif

@yield('script')



</body>

</html>

 @else

 
 </div>
</div>
</div>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script type="text/javascript" src="/assets2/js/plugins/jquery.min.js"></script>
<script type="text/javascript" src="/assets2/js/plugins/popper.min.js"></script>
<script type="text/javascript" src="/assets2/js/plugins/simplebar.min.js"></script>
<script type="text/javascript" src="/assets2/js/plugins/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets2/js/fonts/custom-font.js"></script>
<script type="text/javascript" src="/assets2/js/pcoded.js"></script>
<script type="text/javascript" src="/assets2/js/plugins/feather.min.js"></script>
<script type="text/javascript" src="/assets2/js/plugins/sweetalert2.min.js"></script>
<script type="text/javascript" src="/assets2/js/plugins/toastr.min.js"></script>
<script type="text/javascript" src="/assets2/css/ckeditor/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
 
    <script src="/assets2/js/plugins/jquery.dataTables.min.js"></script>
    <script src="/assets2/js/plugins/dataTables.bootstrap5.min.js"></script>
<script src="/assets/js/ptl2.js?time={{ time() }}"></script>

{!! DataSite('script_footer') !!}
@if (session('error'))
    <script>
          swa1('{{ session('error') }}','error')
    </script>
@endif
@if (session('success'))
    <script>
          swa1('{{ session('success') }}','success')
    </script>
@endif
@if (Auth::check())
    <script>
        callAjax('{{ route('user.action', 'level-user') }}', {
            _token: '{{ csrf_token() }}',
            user: '{{ Auth::user()->level }}'
        }).then(res => {
            if (res.status == 'success') {
             swa1(res.message,'success')
            }
        })
    </script>
@endif

@yield('script')



</body>

</html>

 @endif