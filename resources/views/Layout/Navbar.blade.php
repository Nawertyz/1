@if (getDomain() == env('PARENT_SITE'))
<div class="main-container min-h-screen text-black dark:text-white-dark" :class="[$store.app.navbar]">
    <div :class="{'dark text-white-dark' : $store.app.semidark}">
        <nav x-data="sidebar"
            class="sidebar fixed bottom-0 top-0 z-50 h-full min-h-screen w-[260px] shadow-[5px_0_25px_0_rgba(94,92,154,0.1)] transition-all duration-300">
            <div class="h-full bg-white dark:bg-[#0e1726]">
                <div class="flex items-center justify-between px-4 py-3">
                    <a href="/home" class="main-logo flex shrink-0 items-center">
                        <img class="ml-[3px] w-8 flex-none" src="{{DataSite('favicon')}}" alt="image" />
                        <span
                            class="align-middle text-2xl font-semibold ltr:ml-1.5 rtl:mr-1.5 dark:text-white-light lg:inline">{{DataSite('namesite')}}</span>
                    </a>
                    <a href="javascript:;"
                        class="collapse-icon flex h-8 w-8 items-center rounded-full transition duration-300 hover:bg-gray-500/10 rtl:rotate-180 dark:text-white-light dark:hover:bg-dark-light/10"
                        @click="$store.app.toggleSidebar()">
                        <svg class="m-auto h-5 w-5" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
                <ul class="perfect-scrollbar  text-base relative h-[calc(100vh-80px)] space-y-0.5 overflow-y-auto overflow-x-hidden p-4 py-0 font-semibold"
                    x-data="{ activeDropdown: '/' }">

@if (Auth::user()->position == 'admin')
      
       
                    <li class="nav-item ">
                        <a href="{{ route('admin.dashboard') }}" target="_blank" class=" group">
                            <div class="flex items-center">
                                <svg class="shrink-0 group-hover:!text-primary" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.5"
                                        d="M2 12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274C22 8.77128 22 9.91549 22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039Z"
                                        fill="currentColor" />
                                    <path
                                        d="M9 17.25C8.58579 17.25 8.25 17.5858 8.25 18C8.25 18.4142 8.58579 18.75 9 18.75H15C15.4142 18.75 15.75 18.4142 15.75 18C15.75 17.5858 15.4142 17.25 15 17.25H9Z"
                                        fill="currentColor" />
                                </svg>
                                <span
                                    class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">
                                    Trang quản trị</span>
                            </div>
                        </a>
                    </li>
                    @endif

                    <h2
                        class="-mx-4 mb-1 flex items-center bg-white-light/30 px-7 py-3 font-extrabold uppercase dark:bg-dark dark:bg-opacity-[0.08]">
                        <svg class="hidden h-5 w-4 flex-none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        <span>TRANH CHÍNH</span>
                    </h2>
                    <li class="nav-item">
                        <a href="/home" class=" group">
                            <div class="flex items-center">
                                <svg class="shrink-0 group-hover:!text-primary" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.5"
                                        d="M2 12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274C22 8.77128 22 9.91549 22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039Z"
                                        fill="currentColor" />
                                    <path
                                        d="M9 17.25C8.58579 17.25 8.25 17.5858 8.25 18C8.25 18.4142 8.58579 18.75 9 18.75H15C15.4142 18.75 15.75 18.4142 15.75 18C15.75 17.5858 15.4142 17.25 15 17.25H9Z"
                                        fill="currentColor" />
                                </svg>
                                <span
                                    class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">
                                    Trang chủ</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/profile" class=" group">
                            <div class="flex items-center">
                                <svg class="shrink-0 group-hover:!text-primary" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle opacity="0.5" cx="15" cy="6" r="3" fill="currentColor"></circle>
                                    <ellipse opacity="0.5" cx="16" cy="17" rx="5" ry="3" fill="currentColor"></ellipse>
                                    <circle cx="9.00098" cy="6" r="4" fill="currentColor"></circle>
                                    <ellipse cx="9.00098" cy="17.001" rx="7" ry="4" fill="currentColor"></ellipse>
                                </svg>
                                <span
                                    class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">
                                    Tài khoản của tôi</span>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/recharge/transfer" class=" group">
                            <div class="flex items-center">
                                <svg class="shrink-0 group-hover:!text-primary" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z"
                                        fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12 5.25C12.4142 5.25 12.75 5.58579 12.75 6V6.31673C14.3804 6.60867 15.75 7.83361 15.75 9.5C15.75 9.91421 15.4142 10.25 15 10.25C14.5858 10.25 14.25 9.91421 14.25 9.5C14.25 8.82154 13.6859 8.10339 12.75 7.84748V11.3167C14.3804 11.6087 15.75 12.8336 15.75 14.5C15.75 16.1664 14.3804 17.3913 12.75 17.6833V18C12.75 18.4142 12.4142 18.75 12 18.75C11.5858 18.75 11.25 18.4142 11.25 18V17.6833C9.61957 17.3913 8.25 16.1664 8.25 14.5C8.25 14.0858 8.58579 13.75 9 13.75C9.41421 13.75 9.75 14.0858 9.75 14.5C9.75 15.1785 10.3141 15.8966 11.25 16.1525V12.6833C9.61957 12.3913 8.25 11.1664 8.25 9.5C8.25 7.83361 9.61957 6.60867 11.25 6.31673V6C11.25 5.58579 11.5858 5.25 12 5.25ZM11.25 7.84748C10.3141 8.10339 9.75 8.82154 9.75 9.5C9.75 10.1785 10.3141 10.8966 11.25 11.1525V7.84748ZM14.25 14.5C14.25 13.8215 13.6859 13.1034 12.75 12.8475V16.1525C13.6859 15.8966 14.25 15.1785 14.25 14.5Z"
                                        fill="currentColor"></path>
                                </svg>
                                <span
                                    class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">
                                    Nạp tiền tài khoản</span>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/user/history" class=" group">
                            <div class="flex items-center">
                                <svg class="shrink-0 group-hover:!text-primary" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.5"
                                        d="M6.22209 4.60105C6.66665 4.304 7.13344 4.04636 7.6171 3.82976C8.98898 3.21539 9.67491 2.9082 10.5875 3.4994C11.5 4.09061 11.5 5.06041 11.5 7.00001V8.50001C11.5 10.3856 11.5 11.3284 12.0858 11.9142C12.6716 12.5 13.6144 12.5 15.5 12.5H17C18.9396 12.5 19.9094 12.5 20.5006 13.4125C21.0918 14.3251 20.7846 15.011 20.1702 16.3829C19.9536 16.8666 19.696 17.3334 19.399 17.7779C18.3551 19.3402 16.8714 20.5578 15.1355 21.2769C13.3996 21.9959 11.4895 22.184 9.64665 21.8175C7.80383 21.4509 6.11109 20.5461 4.78249 19.2175C3.45389 17.8889 2.5491 16.1962 2.18254 14.3534C1.81598 12.5105 2.00412 10.6004 2.72315 8.86451C3.44218 7.12861 4.65982 5.64492 6.22209 4.60105Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M21.446 7.06901C20.6342 5.00831 18.9917 3.36579 16.931 2.55398C15.3895 1.94669 14 3.34316 14 5.00002V9.00002C14 9.5523 14.4477 10 15 10H19C20.6569 10 22.0533 8.61055 21.446 7.06901Z"
                                        fill="currentColor"></path>
                                </svg>
                                <span
                                    class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">
                                    Nhật kí hoạt động</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/user/level" class=" group">
                            <div class="flex items-center">
                                <svg class="shrink-0 group-hover:!text-primary" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.42229 20.6181C10.1779 21.5395 11.0557 22.0001 12 22.0001V12.0001L2.63802 7.07275C2.62423 7.09491 2.6107 7.11727 2.5974 7.13986C2 8.15436 2 9.41678 2 11.9416V12.0586C2 14.5834 2 15.8459 2.5974 16.8604C3.19479 17.8749 4.27063 18.4395 6.42229 19.5686L8.42229 20.6181Z"
                                        fill="currentColor"></path>
                                    <path opacity="0.7"
                                        d="M17.5774 4.43152L15.5774 3.38197C13.8218 2.46066 12.944 2 11.9997 2C11.0554 2 10.1776 2.46066 8.42197 3.38197L6.42197 4.43152C4.31821 5.53552 3.24291 6.09982 2.6377 7.07264L11.9997 12L21.3617 7.07264C20.7564 6.09982 19.6811 5.53552 17.5774 4.43152Z"
                                        fill="currentColor"></path>
                                    <path opacity="0.5"
                                        d="M21.4026 7.13986C21.3893 7.11727 21.3758 7.09491 21.362 7.07275L12 12.0001V22.0001C12.9443 22.0001 13.8221 21.5395 15.5777 20.6181L17.5777 19.5686C19.7294 18.4395 20.8052 17.8749 21.4026 16.8604C22 15.8459 22 14.5834 22 12.0586V11.9416C22 9.41678 22 8.15436 21.4026 7.13986Z"
                                        fill="currentColor"></path>
                                </svg>
                                <span
                                    class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">
                                    Cấp bậc & Bảng giá</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/tientrinh" class="   group">
                            <div class="flex items-center">
                                <svg class="shrink-0 group-hover:!text-primary" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.9456 2.84731C18.3542 2.14979 19.0585 1.80104 19.5345 2.11769C20.0104 2.43435 19.9427 3.20671 19.8074 4.75143L19.7724 5.15106C19.7339 5.59003 19.7147 5.80951 19.7834 6.00845C19.852 6.2074 20.0008 6.36329 20.2984 6.67507L20.5694 6.95892C21.6166 8.05609 22.1402 8.60468 21.9676 9.16677C21.795 9.72887 21.0405 9.93221 19.5315 10.3389L19.1411 10.4441C18.7123 10.5597 18.4979 10.6175 18.3269 10.7517C18.156 10.8859 18.0478 11.0814 17.8314 11.4723L17.6344 11.8281C16.873 13.2038 16.4924 13.8916 15.9098 13.9223C15.3272 13.953 14.9285 13.3063 14.1312 12.013L13.925 11.6784C13.6984 11.3108 13.5851 11.1271 13.4108 11.0111C13.2365 10.8951 13.0208 10.86 12.5895 10.7898L12.1968 10.7259C10.6791 10.4789 9.92016 10.3554 9.7327 9.81228C9.54524 9.26918 10.0534 8.66616 11.0696 7.46012L11.3325 7.14811C11.6213 6.80539 11.7657 6.63403 11.8289 6.42812C11.8921 6.22222 11.867 6.00508 11.8168 5.57079L11.7711 5.17542C11.5945 3.64716 11.5062 2.88303 11.9729 2.51664C12.4396 2.15025 13.1523 2.42425 14.5776 2.97224L14.9464 3.11402C15.3514 3.26974 15.554 3.3476 15.7674 3.33634C15.9808 3.32508 16.1809 3.22598 16.5812 3.02776L16.9456 2.84731Z"
                                        fill="currentColor"></path>
                                    <g opacity="0.5">
                                        <path
                                            d="M9.04452 11.3203C5.99048 13.2697 3.27111 16.7967 2.0908 20.0321C1.70785 21.0818 2.59069 22.0006 3.71668 22.0006H4.75C4.75007 21.6498 4.83224 21.2139 4.95372 20.7564C5.07876 20.2855 5.25886 19.743 5.48334 19.1616C5.93221 17.9992 6.57058 16.6505 7.33621 15.3652C8.09909 14.0845 9.0062 12.8366 10.0012 11.8992C10.0258 11.876 10.0506 11.853 10.0754 11.83C10.052 11.8229 10.0289 11.8157 10.0062 11.8084C9.72191 11.7169 9.36664 11.5713 9.04452 11.3203Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M12.0202 12.2173C11.7015 12.4123 11.3705 12.67 11.0298 12.991C10.1729 13.7983 9.34809 14.9188 8.62489 16.1329C7.90444 17.3423 7.30253 18.6146 6.88264 19.7019C6.67275 20.2455 6.51136 20.7351 6.40349 21.1413C6.29223 21.5604 6.25008 21.8464 6.25 22.0006H9.08304C9.08314 20.8766 9.47243 18.7949 10.1769 16.7088C10.6939 15.1781 11.4097 13.5555 12.3322 12.2681L12.0202 12.2173Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M13.2982 13.5134C12.6225 14.5571 12.0472 15.8587 11.5981 17.1888C10.9202 19.1961 10.5832 21.1042 10.583 22.0006H11.8718C12.9978 22.0006 13.9043 21.0942 13.9793 19.9804C14.1081 18.0663 14.4036 16.3411 14.7411 15.1142C14.407 14.918 14.1488 14.6602 13.9589 14.4372C13.7399 14.1801 13.5196 13.859 13.2982 13.5134Z"
                                            fill="currentColor"></path>
                                    </g>
                                </svg>
                                <span
                                    class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">
                                    Tất cả tiến trình</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/create-website" class="   group">
                            <div class="flex items-center">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="shrink-0 group-hover:!text-primary">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.73167 5.77133L5.66953 9.91436C4.3848 11.6526 3.74244 12.5217 4.09639 13.205C4.10225 13.2164 4.10829 13.2276 4.1145 13.2387C4.48945 13.9117 5.59888 13.9117 7.81775 13.9117C9.05079 13.9117 9.6673 13.9117 10.054 14.2754L10.074 14.2946L13.946 9.72466L13.926 9.70541C13.5474 9.33386 13.5474 8.74151 13.5474 7.55682V7.24712C13.5474 3.96249 13.5474 2.32018 12.6241 2.03721C11.7007 1.75425 10.711 3.09327 8.73167 5.77133Z" fill="currentColor"></path>
                                            <path opacity="0.5" d="M10.4527 16.4432L10.4527 16.7528C10.4527 20.0374 10.4527 21.6798 11.376 21.9627C12.2994 22.2457 13.2891 20.9067 15.2685 18.2286L18.3306 14.0856C19.6154 12.3474 20.2577 11.4783 19.9038 10.7949C19.8979 10.7836 19.8919 10.7724 19.8857 10.7613C19.5107 10.0883 18.4013 10.0883 16.1824 10.0883C14.9494 10.0883 14.3329 10.0883 13.9462 9.72461L10.0742 14.2946C10.4528 14.6661 10.4527 15.2585 10.4527 16.4432Z" fill="currentColor"></path>
                                        </svg>
                                <span
                                    class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">
                                    Tạo website riêng</span>
                           
                            </div>
                        </a>
                    </li>
                     
                    <li class="menu nav-item">
                        <button type="button" class="nav-link group"
                            :class="{'active' : activeDropdown === 'service'}"
                            @click="activeDropdown === 'service' ? activeDropdown = null : activeDropdown = 'service'">
                            <div class="flex items-center">
                                <div class="shrink-0 group-hover:!text-primary">
                                <svg class="shrink-0 group-hover:!text-primary" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.97883 9.68508C2.99294 8.89073 2 8.49355 2 8C2 7.50645 2.99294 7.10927 4.97883 6.31492L7.7873 5.19153C9.77318 4.39718 10.7661 4 12 4C13.2339 4 14.2268 4.39718 16.2127 5.19153L19.0212 6.31492C21.0071 7.10927 22 7.50645 22 8C22 8.49355 21.0071 8.89073 19.0212 9.68508L16.2127 10.8085C14.2268 11.6028 13.2339 12 12 12C10.7661 12 9.77318 11.6028 7.7873 10.8085L4.97883 9.68508Z" fill="currentColor"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2 8C2 8.49355 2.99294 8.89073 4.97883 9.68508L7.7873 10.8085C9.77318 11.6028 10.7661 12 12 12C13.2339 12 14.2268 11.6028 16.2127 10.8085L19.0212 9.68508C21.0071 8.89073 22 8.49355 22 8C22 7.50645 21.0071 7.10927 19.0212 6.31492L16.2127 5.19153C14.2268 4.39718 13.2339 4 12 4C10.7661 4 9.77318 4.39718 7.7873 5.19153L4.97883 6.31492C2.99294 7.10927 2 7.50645 2 8Z" fill="currentColor"></path>
                                            <path opacity="0.7" d="M5.76613 10L4.97883 10.3149C2.99294 11.1093 2 11.5065 2 12C2 12.4935 2.99294 12.8907 4.97883 13.6851L7.7873 14.8085C9.77318 15.6028 10.7661 16 12 16C13.2339 16 14.2268 15.6028 16.2127 14.8085L19.0212 13.6851C21.0071 12.8907 22 12.4935 22 12C22 11.5065 21.0071 11.1093 19.0212 10.3149L18.2339 10L16.2127 10.8085C14.2268 11.6028 13.2339 12 12 12C10.7661 12 9.77318 11.6028 7.7873 10.8085L5.76613 10Z" fill="currentColor"></path>
                                            <path opacity="0.4" d="M5.76613 14L4.97883 14.3149C2.99294 15.1093 2 15.5065 2 16C2 16.4935 2.99294 16.8907 4.97883 17.6851L7.7873 18.8085C9.77318 19.6028 10.7661 20 12 20C13.2339 20 14.2268 19.6028 16.2127 18.8085L19.0212 17.6851C21.0071 16.8907 22 16.4935 22 16C22 15.5065 21.0071 15.1093 19.0212 14.3149L18.2339 14L16.2127 14.8085C14.2268 15.6028 13.2339 16 12 16C10.7661 16 9.77318 15.6028 7.7873 14.8085L5.76613 14Z" fill="currentColor"></path>
                                        </svg>
                                </div>
                                <span
                                    class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Các dịch vụ khác</span>
                            </div>
                            <div class="rtl:rotate-180 !rotate-90"
                                :class="{'!rotate-90' : activeDropdown === 'service'}">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </div>
                        </button>
                        <ul x-show="activeDropdown === 'service'" x-collapse="" class="sub-menu text-gray-500"
                            style="height: auto;">
                            @inject('actives', 'App\Models\Actives')


                            @foreach ($actives->where('domain', getDomain())->get() as $sv)

                            <li>
                                <a href="{{ $sv->link }}" target="_blank">{{ $sv->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                   
                    <h2
                        class="-mx-4 mb-1 flex items-center bg-white-light/30 px-7 py-3 font-extrabold uppercase dark:bg-dark dark:bg-opacity-[0.08]">
                        <svg class="hidden h-5 w-4 flex-none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        <span>DỊCH VỤ</span>
                    </h2>

                     
                    @inject('category', 'App\Models\Category')
                    @foreach ($category->where('domain', env('PARENT_SITE'))->where('status',
                            'show')->get() as $category)
                    <li class="nav-item">
                        <a href="/service/{{$category->slug}}" class="   group">
                            <div class="flex items-center">
                            <img src="{{ $category->image }}" width="20" height="20" alt="">
                                <span
                                    class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">
                                    {{$category->name}}</span>
                            </div>
                        </a>
                    </li>
                    @endforeach


                    @inject('service_social', 'App\Models\ServiceSocial')
                    @inject('service', 'App\Models\Service')

                    @foreach ($service_social->where('domain', env('PARENT_SITE'))->where('status', 'show')->get() as  $item)

                    <li class="menu nav-item">
                        <button type="button" class="nav-link group"
                            :class="{'active' : activeDropdown === '{{ $item->slug }}'}"
                            @click="activeDropdown === '{{ $item->slug }}' ? activeDropdown = null : activeDropdown = '{{ $item->slug }}'">
                            <div class="flex items-center">
                                <div class="shrink-0 group-hover:!text-primary">
                                    <img src="{{ $item->image }}" width="20" height="20" alt="">
                                </div>
                                <span
                                    class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">{{ $item->name }}</span>
                            </div>
                            <div class="rtl:rotate-180 !rotate-90"
                                :class="{'!rotate-90' : activeDropdown === '{{ $item->slug }}'}">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </div>
                        </button>
                        <ul x-show="activeDropdown === '{{ $item->slug }}'" x-collapse="" class="sub-menu text-gray-500"
                            style="height: auto;">


                            @foreach ($service->where('domain', env('PARENT_SITE'))->where('status',
                            'show')->where('service_social', $item->slug)->get() as $sv)

                            <li>
                                <a href="/service/{{$item->slug}}/{{$sv->slug}}">{{ $sv->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    @endforeach

                    <h2
                        class="-mx-4 mb-1 flex items-center bg-white-light/30 px-7 py-3 font-extrabold uppercase dark:bg-dark dark:bg-opacity-[0.08]">
                        <svg class="hidden h-5 w-4 flex-none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        <span>Khác</span>
                    </h2>
                    <li class="nav-item">
                        <a href="/create-support" class="   group">
                            <div class="flex items-center">
                            <svg class="shrink-0 group-hover:!text-primary" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M24 5C24 6.65685 22.6569 8 21 8C19.3431 8 18 6.65685 18 5C18 3.34315 19.3431 2 21 2C22.6569 2 24 3.34315 24 5Z" fill="currentColor"></path>
                                                    <path d="M17.2339 7.46394L15.6973 8.74444C14.671 9.59966 13.9585 10.1915 13.357 10.5784C12.7747 10.9529 12.3798 11.0786 12.0002 11.0786C11.6206 11.0786 11.2258 10.9529 10.6435 10.5784C10.0419 10.1915 9.32941 9.59966 8.30315 8.74444L5.92837 6.76546C5.57834 6.47377 5.05812 6.52106 4.76643 6.87109C4.47474 7.22112 4.52204 7.74133 4.87206 8.03302L7.28821 10.0465C8.2632 10.859 9.05344 11.5176 9.75091 11.9661C10.4775 12.4334 11.185 12.7286 12.0002 12.7286C12.8154 12.7286 13.523 12.4334 14.2495 11.9661C14.947 11.5176 15.7372 10.859 16.7122 10.0465L18.3785 8.65795C17.9274 8.33414 17.5388 7.92898 17.2339 7.46394Z" fill="currentColor"></path>
                                                    <path d="M18.4538 6.58719C18.7362 6.53653 19.0372 6.63487 19.234 6.87109C19.3965 7.06614 19.4538 7.31403 19.4121 7.54579C19.0244 7.30344 18.696 6.97499 18.4538 6.58719Z" fill="currentColor"></path>
                                                    <path opacity="0.5" d="M16.9576 3.02099C16.156 3 15.2437 3 14.2 3H9.8C5.65164 3 3.57746 3 2.28873 4.31802C1 5.63604 1 7.75736 1 12C1 16.2426 1 18.364 2.28873 19.682C3.57746 21 5.65164 21 9.8 21H14.2C18.3484 21 20.4225 21 21.7113 19.682C23 18.364 23 16.2426 23 12C23 10.9326 23 9.99953 22.9795 9.1797C22.3821 9.47943 21.7103 9.64773 21 9.64773C18.5147 9.64773 16.5 7.58722 16.5 5.04545C16.5 4.31904 16.6646 3.63193 16.9576 3.02099Z" fill="currentColor"></path>
                                                </svg>
                                <span
                                    class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">
                                    Tạo hỗ trợ</span>
                            </div>
                        </a>
                    </li>
                    
                </ul>
            </div>
        </nav>
    </div>
    <div class="main-content flex min-h-screen flex-col">
        <header class="z-40" :class="{'dark' : $store.app.semidark && $store.app.menu === 'horizontal'}">
            <div class="shadow-sm">
                <div class="relative flex w-full items-center bg-white px-5 py-2.5 dark:bg-[#0e1726]">
                    <div class="horizontal-logo flex items-center justify-between ltr:mr-2 rtl:ml-2 lg:hidden">
                        <a href="/home" class="main-logo flex shrink-0 items-center">
                            <img class="inline w-8 ltr:-ml-1 rtl:-mr-1" src="{{DataSite('favicon')}}" alt="image" />
                            <span
                                class="hidden align-middle text-2xl font-semibold transition-all duration-300 ltr:ml-1.5 rtl:mr-1.5 dark:text-white-light md:inline">{{DataSite('namesite')}}</span>
                        </a>
                        <a href="javascript:;"
                            class="collapse-icon flex flex-none rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 hover:text-primary ltr:ml-2 rtl:mr-2 dark:bg-dark/40 dark:text-[#d0d2d6] dark:hover:bg-dark/60 dark:hover:text-primary lg:hidden"
                            @click="$store.app.toggleSidebar()">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 7L4 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path opacity="0.5" d="M20 12L4 12" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" />
                                <path d="M20 17L4 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </a>
                    </div>
                    <div x-data="header"
                        class="flex items-center space-x-1.5 ltr:ml-auto rtl:mr-auto rtl:space-x-reverse dark:text-[#d0d2d6] sm:flex-1 ltr:sm:ml-0 sm:rtl:mr-0 lg:space-x-2">
                        <div class="sm:ltr:mr-auto sm:rtl:ml-auto" x-data="{ search: false }"
                            @click.outside="search = false">
                            <form
                                class="absolute inset-x-0 top-1/2 z-10 mx-4 hidden -translate-y-1/2 sm:relative sm:top-0 sm:mx-0 sm:block sm:translate-y-0"
                                :class="{'!block' : search}" @submit.prevent="search = false">
                                <div class="relative">
                                    <input type="text"
                                        class="peer form-input bg-gray-100 placeholder:tracking-widest ltr:pl-9 ltr:pr-9 rtl:pl-9 rtl:pr-9 sm:bg-transparent ltr:sm:pr-4 rtl:sm:pl-4"
                                        placeholder="Search..." />
                                    <button type="button"
                                        class="absolute inset-0 h-9 w-9 appearance-none peer-focus:text-primary ltr:right-auto rtl:left-auto">
                                        <svg class="mx-auto" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="11.5" cy="11.5" r="9.5" stroke="currentColor" stroke-width="1.5"
                                                opacity="0.5" />
                                            <path d="M18.5 18.5L22 22" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" />
                                        </svg>
                                    </button>
                                    <button type="button"
                                        class="absolute top-1/2 block -translate-y-1/2 hover:opacity-80 ltr:right-2 rtl:left-2 sm:hidden"
                                        @click="search = false">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle opacity="0.5" cx="12" cy="12" r="10" stroke="currentColor"
                                                stroke-width="1.5" />
                                            <path d="M14.5 9.50002L9.5 14.5M9.49998 9.5L14.5 14.5" stroke="currentColor"
                                                stroke-width="1.5" stroke-linecap="round" />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                            <button type="button"
                                class="search_btn rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 dark:bg-dark/40 dark:hover:bg-dark/60 sm:hidden"
                                @click="search = ! search">
                                <svg class="mx-auto h-4.5 w-4.5 dark:text-[#d0d2d6]" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="11.5" cy="11.5" r="9.5" stroke="currentColor" stroke-width="1.5"
                                        opacity="0.5" />
                                    <path d="M18.5 18.5L22 22" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" />
                                </svg>
                            </button>
                        </div>
                        <div>
                            <a href="javascript:;" x-cloak x-show="$store.app.theme === 'light'" href="javascript:;"
                                class="flex items-center rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 hover:text-primary dark:bg-dark/40 dark:hover:bg-dark/60"
                                @click="$store.app.toggleTheme('dark')">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12" cy="12" r="5" stroke="currentColor" stroke-width="1.5" />
                                    <path d="M12 2V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M12 20V22" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" />
                                    <path d="M4 12L2 12" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" />
                                    <path d="M22 12L20 12" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" />
                                    <path opacity="0.5" d="M19.7778 4.22266L17.5558 6.25424" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" />
                                    <path opacity="0.5" d="M4.22217 4.22266L6.44418 6.25424" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" />
                                    <path opacity="0.5" d="M6.44434 17.5557L4.22211 19.7779" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" />
                                    <path opacity="0.5" d="M19.7778 19.7773L17.5558 17.5551" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                            </a>
                            <a href="javascript:;" x-cloak x-show="$store.app.theme === 'dark'" href="javascript:;"
                                class="flex items-center rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 hover:text-primary dark:bg-dark/40 dark:hover:bg-dark/60"
                                @click="$store.app.toggleTheme('system')">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M21.0672 11.8568L20.4253 11.469L21.0672 11.8568ZM12.1432 2.93276L11.7553 2.29085V2.29085L12.1432 2.93276ZM21.25 12C21.25 17.1086 17.1086 21.25 12 21.25V22.75C17.9371 22.75 22.75 17.9371 22.75 12H21.25ZM12 21.25C6.89137 21.25 2.75 17.1086 2.75 12H1.25C1.25 17.9371 6.06294 22.75 12 22.75V21.25ZM2.75 12C2.75 6.89137 6.89137 2.75 12 2.75V1.25C6.06294 1.25 1.25 6.06294 1.25 12H2.75ZM15.5 14.25C12.3244 14.25 9.75 11.6756 9.75 8.5H8.25C8.25 12.5041 11.4959 15.75 15.5 15.75V14.25ZM20.4253 11.469C19.4172 13.1373 17.5882 14.25 15.5 14.25V15.75C18.1349 15.75 20.4407 14.3439 21.7092 12.2447L20.4253 11.469ZM9.75 8.5C9.75 6.41182 10.8627 4.5828 12.531 3.57467L11.7553 2.29085C9.65609 3.5593 8.25 5.86509 8.25 8.5H9.75ZM12 2.75C11.9115 2.75 11.8077 2.71008 11.7324 2.63168C11.6686 2.56527 11.6538 2.50244 11.6503 2.47703C11.6461 2.44587 11.6482 2.35557 11.7553 2.29085L12.531 3.57467C13.0342 3.27065 13.196 2.71398 13.1368 2.27627C13.0754 1.82126 12.7166 1.25 12 1.25V2.75ZM21.7092 12.2447C21.6444 12.3518 21.5541 12.3539 21.523 12.3497C21.4976 12.3462 21.4347 12.3314 21.3683 12.2676C21.2899 12.1923 21.25 12.0885 21.25 12H22.75C22.75 11.2834 22.1787 10.9246 21.7237 10.8632C21.286 10.804 20.7293 10.9658 20.4253 11.469L21.7092 12.2447Z"
                                        fill="currentColor" />
                                </svg>
                            </a>
                            <a href="javascript:;" x-cloak x-show="$store.app.theme === 'system'" href="javascript:;"
                                class="flex items-center rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 hover:text-primary dark:bg-dark/40 dark:hover:bg-dark/60"
                                @click="$store.app.toggleTheme('light')">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3 9C3 6.17157 3 4.75736 3.87868 3.87868C4.75736 3 6.17157 3 9 3H15C17.8284 3 19.2426 3 20.1213 3.87868C21 4.75736 21 6.17157 21 9V14C21 15.8856 21 16.8284 20.4142 17.4142C19.8284 18 18.8856 18 17 18H7C5.11438 18 4.17157 18 3.58579 17.4142C3 16.8284 3 15.8856 3 14V9Z"
                                        stroke="currentColor" stroke-width="1.5" />
                                    <path opacity="0.5" d="M22 21H2" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" />
                                    <path opacity="0.5" d="M15 15H9" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="dropdown flex-shrink-0 ltr:pl-3 rtl:pr-3" x-data="dropdown"
                        @click.outside="open = false">
                        <a href="javascript:;" class="group relative" @click="toggle()">
                            <span>
                                <img class="h-9 w-9 rounded-full object-cover saturate-50 group-hover:saturate-100"
                                    src="{{ Auth::user()->avatar }}"
                                    alt="image" />
                            </span>
                        </a>
                        <ul x-cloak x-show="open" x-transition x-transition.duration.300ms
                            class="top-11 w-[230px] !py-0 font-semibold text-dark ltr:right-0 rtl:left-0 dark:text-white-dark dark:text-white-light/90">
                            <li>
                                <div class="flex items-center px-4 py-4">
                                    <div class="flex-none">
                                        <img class="h-10 w-10 rounded-md object-cover"
                                            src="{{ Auth::user()->avatar }}"
                                            alt="image" />
                                    </div>
                                    <div class="truncate ltr:pl-4 rtl:pr-4">
                                        <h4 class="text-base"> {{ Auth::user()->name }}
                                        </h4>
                                        <a class="text-black/60 hover:text-primary dark:text-dark-light/60 dark:hover:text-white"
                                            href="javascript:;">{{ number_format(Auth::user()->balance) }} VNĐ</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="/profile" class="dark:hover:text-white" @click="toggle">
                                    <svg class="h-4.5 w-4.5 shrink-0 ltr:mr-2 rtl:ml-2" width="18" height="18"
                                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="6" r="4" stroke="currentColor" stroke-width="1.5" />
                                        <path opacity="0.5"
                                            d="M20 17.5C20 19.9853 20 22 12 22C4 22 4 19.9853 4 17.5C4 15.0147 7.58172 13 12 13C16.4183 13 20 15.0147 20 17.5Z"
                                            stroke="currentColor" stroke-width="1.5" />
                                    </svg>
                                    Tài khoản
                                </a>
                            </li>
                            <li>
                                <a href="/recharge/transfer" class="dark:hover:text-white" @click="toggle">
                                    <svg class="h-4.5 w-4.5 shrink-0 ltr:mr-2 rtl:ml-2" width="18" height="18"
                                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12 2.75C6.89137 2.75 2.75 6.89137 2.75 12C2.75 17.1086 6.89137 21.25 12 21.25C17.1086 21.25 21.25 17.1086 21.25 12C21.25 6.89137 17.1086 2.75 12 2.75ZM1.25 12C1.25 6.06294 6.06294 1.25 12 1.25C17.9371 1.25 22.75 6.06294 22.75 12C22.75 17.9371 17.9371 22.75 12 22.75C6.06294 22.75 1.25 17.9371 1.25 12ZM12 5.25C12.4142 5.25 12.75 5.58579 12.75 6V6.31673C14.3804 6.60867 15.75 7.83361 15.75 9.5C15.75 9.91421 15.4142 10.25 15 10.25C14.5858 10.25 14.25 9.91421 14.25 9.5C14.25 8.82154 13.6859 8.10339 12.75 7.84748V11.3167C14.3804 11.6087 15.75 12.8336 15.75 14.5C15.75 16.1664 14.3804 17.3913 12.75 17.6833V18C12.75 18.4142 12.4142 18.75 12 18.75C11.5858 18.75 11.25 18.4142 11.25 18V17.6833C9.61957 17.3913 8.25 16.1664 8.25 14.5C8.25 14.0858 8.58579 13.75 9 13.75C9.41421 13.75 9.75 14.0858 9.75 14.5C9.75 15.1785 10.3141 15.8966 11.25 16.1525V12.6833C9.61957 12.3913 8.25 11.1664 8.25 9.5C8.25 7.83361 9.61957 6.60867 11.25 6.31673V6C11.25 5.58579 11.5858 5.25 12 5.25ZM11.25 7.84748C10.3141 8.10339 9.75 8.82154 9.75 9.5C9.75 10.1785 10.3141 10.8966 11.25 11.1525V7.84748ZM12.75 12.8475V16.1525C13.6859 15.8966 14.25 15.1785 14.25 14.5C14.25 13.8215 13.6859 13.1034 12.75 12.8475Z"
                                            fill="#1C274C" />
                                    </svg>
                                    Nạp tiền
                                </a>
                            </li>
                            <li class="border-t border-white-light dark:border-white-light/10">
                                <a href="{{ route('logout') }}" class="!py-3 text-danger" @click="toggle">
                                    <svg class="h-4.5 w-4.5 shrink-0 rotate-90 ltr:mr-2 rtl:ml-2" width="18" height="18"
                                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.5"
                                            d="M17 9.00195C19.175 9.01406 20.3529 9.11051 21.1213 9.8789C22 10.7576 22 12.1718 22 15.0002V16.0002C22 18.8286 22 20.2429 21.1213 21.1215C20.2426 22.0002 18.8284 22.0002 16 22.0002H8C5.17157 22.0002 3.75736 22.0002 2.87868 21.1215C2 20.2429 2 18.8286 2 16.0002L2 15.0002C2 12.1718 2 10.7576 2.87868 9.87889C3.64706 9.11051 4.82497 9.01406 7 9.00195"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                        <path d="M12 15L12 2M12 2L15 5.5M12 2L9 5.5" stroke="currentColor"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    Đăng Xuất
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <div class="animate__animated p-6" :class="[$store.app.animation]">
            <div>
                <ul class="flex space-x-2 rtl:space-x-reverse">
                    <li>
                        <a href="javascript:;"
                            class="text-primary hover:underline">{{DataSite('namesite')}}</a>
                    </li>
                    <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                        <span>  @yield('title')</span>
                    </li>
                </ul>
                
                @yield('content')
 

                 @else

                 <nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header">
      <a href="/home" class="b-brand text-primary">
        <!-- ========   Change your logo from here   ============ -->
        <img src="{{ DataSite('logo') }}" width="200" />
        <span class="badge bg-light-success rounded-pill ms-2 theme-version"></span>
      </a>
    </div>
    <div class="navbar-content">
      

      <ul class="pc-navbar">
           @if (Auth::user()->position == 'admin')
        <li class="pc-item"
          ><a href="{{ route('admin.dashboard') }}" target="_blank" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="#custom-setting-outline"></use>
              </svg>
            </span>
            <span class="pc-mtext">Trang quản trị</span></a
          ></li>
          @endif
          
        <li class="pc-item pc-caption">
          <label>HỆ THỐNG</label>
          
        </li>
        
        <li class="pc-item">
          <a href="{{ route('home') }}" class="pc-link">
            <span class="pc-micon">
              <img src="/anhlamtilo/home.png" width="25px" height="25px">
                <use xlink:href="#custom-home"></use>
              </svg>
            </span>
            <span class="pc-mtext">Trang chủ</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="{{ route('profile') }}" class="pc-link">
            <span class="pc-micon">
              <img src="/anhlamtilo/account.png" width="25px" height="25px">
                <use xlink:href="#custom-user"></use>
              </svg>
            </span>
            <span class="pc-mtext">Tài khoản của tôi</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="{{ route('recharge.transfer') }}" class="pc-link">
            <span class="pc-micon">
                <img src="/anhlamtilo/payment.png" width="25px" height="25px">
            </span>
            <span class="pc-mtext">Nạp tiền tài khoản</span></a>
        </li>
        <li class="pc-item">
          <a href="{{ route('user.history') }}" class="pc-link">
            <span class="pc-micon">
                 <img src="/anhlamtilo/statistic.png" width="25px" height="25px">
            </span>
            <span class="pc-mtext">Nhật kí hoạt động</span></a>
        </li>
        <li class="pc-item">
          <a href="{{ route('user.level') }}" class="pc-link">
            <span class="pc-micon">
              
                <img src="/anhlamtilo/progress.png" width="25px" height="25px">
           
            </span>
            <span class="pc-mtext">Cấp bậc tài khoản</span></a>
        </li>
        <li class="pc-item">
          <a href="{{ route('create.website') }}" class="pc-link">
            <span class="pc-micon">
              <img src="/anhlamtilo/statistic.png" width="25px" height="25px">
                <use xlink:href="#custom-presentation-chart"></use>
              </svg>
            </span>
            <span class="pc-mtext">Tạo website đại lí</span></a>
        </li>
         @inject('actives', 'App\Models\Actives')

              
<li class="pc-item pc-hasmenu">
  <a href="#!" class="pc-link">
    <span class="pc-micon">
    <img src="/assets/images/server.png" width="25" alt="">
    </span>
    <span class="pc-mtext">Các dịch vụ khác</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span
  ></a>
  <ul class="pc-submenu">
     @foreach ($actives->where('domain', getDomain())->get() as $sv)
    <li class="pc-item"><a class="pc-link" href="{{ $sv->link }}" target="_blank">{{ $sv->name }}</a></li>
     @endforeach
  </ul>
  </li>
  
        <li class="pc-item pc-caption">
          <label>BẢNG GIÁ & DỊCH VỤ</label>
         
        </li>
         <li class="pc-item">
          <a href="{{ route('service.price') }}" class="pc-link">
            <span class="pc-micon">
             <img src="/anhlamtilo/services.png" width="25px" height="25px">
            </span>
            <span class="pc-mtext">Bảng giá máy chủ</span></a>
        </li>
           @inject('service_social', 'App\Models\ServiceSocial')
                @inject('service', 'App\Models\Service')

                @foreach ($service_social->where('domain', env('PARENT_SITE'))->where('status', 'show')->get() as $item)
        <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link">
            <span class="pc-micon">
              <img src="{{ $item->image }}" width="25" alt="">
            </span>
            <span class="pc-mtext">{{ $item->name }}</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span
          ></a>
          <ul class="pc-submenu">
             @foreach ($service->where('domain', env('PARENT_SITE'))->where('status', 'show')->where('service_social', $item->slug)->get() as $sv)
            <li class="pc-item"><a class="pc-link" href="{{ route('service.view', ['social' => $item->slug, 'service' => $sv->slug]) }}">{{ $sv->name }}</a></li>
             @endforeach
          </ul>
        </li>
        @endforeach

     
               
        <li class="pc-item pc-caption">
          <label>Dịch vụ khác</label>
          
        </li>
       
     <li class="pc-item">
          <a href="{{ route('create.support') }}" class="pc-link">
            <span class="pc-micon">
              <img src="/assets/images/customer-service.png" width="25px" height="25px">
                <use xlink:href="#custom-user"></use>
              </svg>
            </span>
            <span class="pc-mtext">Hỗ trợ</span>
          </a>
        </li>

  
     <li class="pc-item"
          ><a href="https://documenter.getpostman.com/view/26265513/2s9YkuXxbs" target="_blank" class="pc-link">
          <span class="pc-micon">
              <img src="/assets/images/computer.png" width="25" alt="">
            </span>
            <span class="pc-mtext">Tài liệu API</span></a
          ></li>  
       
              <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link">
            <span class="pc-micon">
             <img src="/assets/images/settings.png" width="25px" height="25px">
            </span>
            <span class="pc-mtext">Công cụ miễn phí</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span
          ></a>
          <ul class="pc-submenu">
                         <li class="pc-item"><a class="pc-link" href="{{ route('tool.uid') }}">Get ID Facebook</a></li>
                         <li class="pc-item"><a class="pc-link" href="{{ route('tool.2fa') }}">Get 2FA code</a></li>
                           <li class="pc-item"><a class="pc-link" href="{{ route('tool.domain') }}">Check tên miền</a></li>
                       </ul>
        </li>

               
     
    
      </ul>
    </div>
  </div>
</nav>
<header class="pc-header">
  <div class="header-wrapper"> <!-- [Mobile Media Block] start -->
<div class="me-auto pc-mob-drp">
  <ul class="list-unstyled">
    <!-- ======= Menu collapse Icon ===== -->
    <li class="pc-h-item pc-sidebar-collapse">
      <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
        <i class="ti ti-menu-2"></i>
      </a>
    </li>
    <li class="pc-h-item pc-sidebar-popup">
      <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
        <i class="ti ti-menu-2"></i>
      </a>
    </li>
    <li class="dropdown pc-h-item">
      <a
        class="pc-head-link dropdown-toggle arrow-none m-0 trig-drp-search"
        data-bs-toggle="dropdown"
        href="#"
        role="button"
        aria-haspopup="false"
        aria-expanded="false"
      >
        <svg class="pc-icon">
          <use xlink:href="#custom-search-normal-1"></use>
        </svg>
      </a>
      <div class="dropdown-menu pc-h-dropdown drp-search">
        <form class="px-3 py-2">
          <input type="search" class="form-control border-0 shadow-none" placeholder="Search here. . ." />
        </form>
      </div>
    </li>
  </ul>
</div>
<!-- [Mobile Media Block end] -->
<div class="ms-auto">
  <ul class="list-unstyled">
  <li class="dropdown pc-h-item">
            <style>
     div#\:0\.targetLanguage,
    a.VIpgJd-ZVi9od-l4eHX-hSRGPd {
        display: none;
    }

    .goog-logo-link {
        display: none !important;
    }

    .goog-te-gadget {
        color: transparent !important;
    }

    select.goog-te-combo {
        width:100%;
        border: 1px solid #dcdcdc;
        padding: 8px;
    }

    .skiptranslate:not(.goog-te-gadget) {
        visibility: hidden !important;
    }

    .goog-te-banner-frame.skiptranslate,
    .VIpgJd-ZVi9od-aZ2wEe-wOHMyf.VIpgJd-ZVi9od-aZ2wEe-wOHMyf-ti6hGc {
        visibility: hidden !important;
    }

    body {
        top: 0 !important;
    }

    .skiptranslate goog-te-gadget {
        display: inline;
    }

  

    #google_translate_element,
    .skiptranslate.goog-te-gadget,
    .skiptranslate.goog-te-gadget>div {
        display: inline !important;
    }

    
    
</style>
             <div id="google_translate_element"></div>
                            <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                            <script>
                                function googleTranslateElementInit() {
                                    new google.translate.TranslateElement({
                                        pageLanguage: 'vi',
                                        // includedLanguages: 'cs,de,en,es,fr,fy,hi,hmn,hu,id,ja,km,kn,ko,la,lo,mg,ml,mn,ms,ne,pt,ro,ru,th,tr,uk,vi,zh-CN,zh-TW',
                                        layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL,
                                        // multilanguagePage: true
                                    }, 'google_translate_element');
                                }
                            </script>
            
       </li>
    <li class="dropdown pc-h-item">
      <a
        class="pc-head-link dropdown-toggle arrow-none me-0"
        data-bs-toggle="dropdown"
        href="#"
        role="button"
        aria-haspopup="false"
        aria-expanded="false"
      >
        <svg class="pc-icon">
          <use xlink:href="#custom-sun-1"></use>
        </svg>
      </a>
      <div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
        <a href="#!" class="dropdown-item" onclick="layout_change('dark')">
          <svg class="pc-icon">
            <use xlink:href="#custom-moon"></use>
          </svg>
          <span>Giao diện tối</span>
        </a>
        <a href="#!" class="dropdown-item" onclick="layout_change('light')">
          <svg class="pc-icon">
            <use xlink:href="#custom-sun-1"></use>
          </svg>
          <span>Giao diện sáng</span>
        </a>
        
      </div>
    </li>
     
   
    <li class="dropdown pc-h-item">
      <a
        class="pc-head-link dropdown-toggle arrow-none me-0"
        data-bs-toggle="dropdown"
        href="#"
        role="button"
        aria-haspopup="false"
        aria-expanded="false"
      >
        <svg class="pc-icon">
          <use xlink:href="#custom-notification"></use>
        </svg>
        <span class="badge bg-success pc-h-badge">3</span>
      </a>
      <div class="dropdown-menu dropdown-notification dropdown-menu-end pc-h-dropdown">
        <div class="dropdown-header d-flex align-items-center justify-content-between">
          <h5 class="m-0">Thông báo mới nhất</h5>
          <a href="#!" class="btn btn-link btn-sm">Đánh dấu đọc tất cả</a>
        </div>
      
      <div class="dropdown-body text-wrap header-notification-scroll position-relative" style="max-height: calc(100vh - 215px)">
         @foreach ($activities as $item)
          <div class="card mb-2">
            <div class="card-body">
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <svg class="pc-icon text-primary">
                    <use xlink:href="#custom-layer"></use>
                  </svg>
                </div>
                <div class="flex-grow-1 ms-3">
                  <span class="float-end text-sm text-muted">{{ timeago($item->created_at) }}</span>
                  <h5 class="text-body mb-2">{{ $item->name }}</h5>
                  <p class="mb-0"
                    >{!! $item->content !!}</p
                  >
                </div>
              </div>
            </div>
          </div>
           @endforeach
          </div>
          
        <div class="text-center py-2">
          <a href="#!" class="link-danger">Clear all Notifications</a>
        </div>
      </div>
    </li>
    <li class="dropdown pc-h-item header-user-profile">
      <a
        class="pc-head-link dropdown-toggle arrow-none me-0"
        data-bs-toggle="dropdown"
        href="#"
        role="button"
        aria-haspopup="false"
        data-bs-auto-close="outside"
        aria-expanded="false"
      >
        <img src="{{ Auth::user()->avatar }}" alt="user-image" class="user-avtar" />
      </a>
      <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
        <div class="dropdown-header d-flex align-items-center justify-content-between">
          <h5 class="m-0">Profile</h5>
        </div>
        <div class="dropdown-body">
          <div class="profile-notification-scroll position-relative" style="max-height: calc(100vh - 225px)">
            <div class="d-flex mb-1">
              <div class="flex-shrink-0">
                <img src="{{ Auth::user()->avatar }}" alt="user-image" class="user-avtar wid-35" />
              </div>
              <div class="flex-grow-1 ms-3">
                <h6 class="mb-1">{{ Auth::user()->name }} <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                                <path d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z" fill="#00A3FF"></path>
                                                <path class="permanent" d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z" fill="white"></path>
                                            </svg></h6>
                <span>{{ Auth::user()->email }}</span>
              </div>
            </div>
            <hr class="border-secondary border-opacity-50" />
       
            <p class="text-span">Thông Tin</p>
            <a href="{{ route('profile') }}" class="dropdown-item">
              <span>
                  <i class="fa fa-user"></i>
                <span>Tài khoản của tôi</span>
              </span>
            </a>
            <a href="{{ route('recharge.transfer') }}" class="dropdown-item">
              <span>
                  <i class="fa fa-piggy-bank"></i>
                <span>Nạp tiền tài khoản</span>
              </span>
            </a>
              <hr class="border-secondary border-opacity-50" />
              <p class="text-span">Hỗ Trợ</p>
            <a href="{{DataSite('facebook')}}" class="dropdown-item" target="_blank">
              <span>
                <i class="ti ti-brand-facebook"></i>
                <span>Hỗ Trợ Facebook</span>
              </span>
            </a>
            <a href="{{DataSite('telegram')}}" class="dropdown-item" target="_blank">
              <span>
                  <i class="ti ti-brand-telegram"></i>
                <span>Hỗ Trợ Telegram</span>
              </span>
            </a>
            <hr class="border-secondary border-opacity-50" />
           
           
            <div class="d-grid mb-3">
              <a href="{{ route('logout') }}" class="btn btn-primary">
                <svg class="pc-icon me-2">
                  <use xlink:href="#custom-logout-1-outline"></use></svg>Logout
              </a>
            </div>
            <div
              class="card border-0 shadow-none drp-upgrade-card mb-0"
              style="background-image: url(/assets2/images/layout/img-profile-card.jpg)"
            >
              <div class="card-body">
                <div class="user-group">
                  <img src="{{ Auth::user()->avatar }}" alt="user-image" class="avtar" />
                  <img src="{{ Auth::user()->avatar }}" alt="user-image" class="avtar" />
                  <img src="/assets2/images/user/avatar-3.jpg" alt="user-image" class="avtar" />
                  <img src="/assets2/images/user/avatar-4.jpg" alt="user-image" class="avtar" />
                  <img src="/assets2/images/user/avatar-5.jpg" alt="user-image" class="avtar" />
                  <span class="avtar bg-light-primary text-primary">+20</span>
                </div>
                <h3 class="my-3 text-dark">245.3k <small class="text-muted">Followers</small></h3>
                <div class="btn btn btn-warning">
                  <a href="{{ route('user.level') }}" class="text-white">
                  <svg class="pc-icon me-2">
                    <use xlink:href="#custom-logout-1-outline"></use>
                  </svg>
                  Nâng Cấp Tài Khoản
                </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </li>
  </ul>
</div>
 </div>
</header>
<div class="offcanvas pc-announcement-offcanvas offcanvas-end" tabindex="-1" id="announcement" aria-labelledby="announcementLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="announcementLabel">What’s new announcement?</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <p class="text-span">Today</p>
    <div class="card mb-3">
      <div class="card-body">
        <div class="align-items-center d-flex flex-wrap gap-2 mb-3">
          <div class="badge bg-light-success f-12">Big News</div>
          <p class="mb-0 text-muted">2 min ago</p>
          <span class="badge dot bg-warning"></span>
        </div>
        <h5 class="mb-3">Able Pro is Redesigned</h5>
        <p class="text-muted">Able Pro is completely renowed with high aesthetics User Interface.</p>
        <img src="/assets2/images/layout/img-announcement-1.png" alt="img" class="img-fluid mb-3" />
        <div class="row">
          <div class="col-12">
            <div class="d-grid"
              ><a
                class="btn btn-outline-secondary"
                href="https://1.envato.market/c/1289604/275988/4415?subId1=phoenixcoded&u=https%3A%2F%2Fthemeforest.net%2Fitem%2Fable-pro-responsive-bootstrap-4-admin-template%2F19300403"
                target="_blank"
                >Check Now</a
              ></div
            >
          </div>
        </div>
      </div>
    </div>
    <div class="card mb-3">
      <div class="card-body">
        <div class="align-items-center d-flex flex-wrap gap-2 mb-3">
          <div class="badge bg-light-warning f-12">Offer</div>
          <p class="mb-0 text-muted">2 hour ago</p>
          <span class="badge dot bg-warning"></span>
        </div>
        <h5 class="mb-3">Able Pro is in best offer price</h5>
        <p class="text-muted">Download Able Pro exclusive on themeforest with best price. </p>
        <a
          href="https://1.envato.market/c/1289604/275988/4415?subId1=phoenixcoded&u=https%3A%2F%2Fthemeforest.net%2Fitem%2Fable-pro-responsive-bootstrap-4-admin-template%2F19300403"
          target="_blank"
          ><img src="/assets2/images/layout/img-announcement-2.png" alt="img" class="img-fluid"
        /></a>
      </div>
    </div>

    <p class="text-span mt-4">Yesterday</p>
    <div class="card mb-3">
      <div class="card-body">
        <div class="align-items-center d-flex flex-wrap gap-2 mb-3">
          <div class="badge bg-light-primary f-12">Blog</div>
          <p class="mb-0 text-muted">12 hour ago</p>
          <span class="badge dot bg-warning"></span>
        </div>
        <h5 class="mb-3">Featured Dashboard Template</h5>
        <p class="text-muted">Do you know Able Pro is one of the featured dashboard template selected by Themeforest team.?</p>
        <img src="/assets2/images/layout/img-announcement-3.png" alt="img" class="img-fluid" />
      </div>
    </div>
    <div class="card mb-3">
      <div class="card-body">
        <div class="align-items-center d-flex flex-wrap gap-2 mb-3">
          <div class="badge bg-light-primary f-12">Announcement</div>
          <p class="mb-0 text-muted">12 hour ago</p>
          <span class="badge dot bg-warning"></span>
        </div>
        <h5 class="mb-3">Buy Once - Get Free Updated lifetime</h5>
        <p class="text-muted">Get the lifetime free updates once you purchase the Able Pro.</p>
        <img src="/assets2/images/layout/img-announcement-4.png" alt="img" class="img-fluid" />
      </div>
    </div>
  </div>
</div>
<div class="pc-container">
      <div class="pc-content">
        <!-- [ breadcrumb ] start -->
         
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <ul class="breadcrumb mb-3">
                  <li class="breadcrumb-item"><a href="/home">Trang chủ</a></li>
                   
                  <li class="breadcrumb-item" aria-current="page">@yield('title')</li>
                </ul>
              </div>
               
            
          </div>
        </div>
       
        @yield('content')


                 @endif