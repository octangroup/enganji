<div class="w-90 hidden xl:block mx-auto bg-primary rounded-t-xlg mt-5">

    <div class="pt-4 pb-5 px-5 w-100 flex">
        <div class="w-50 pt-2 text-white text-left">
            <h2 class="xl:text-xl xs:text-base mx-3  font-normal">Get in touch</h2>
            <p class=" mx-3 opacity-70 w-50 mr-auto">Connect with us through our various social media platforms</p>
            <ul class="list inline-block">
                <li class="mx-2">
                        <span class="fa-stack fa-1x rounded-full">
                        <i class="fa fa-circle fa-stack-2x text-white"></i>
                        <i class="fab fa-twitter fa-stack-1x text-centered text-black"></i>
                        </span>
                </li>
                <li class="mx-2">
                        <span class="fa-stack fa-1x rounded-full">
                        <i class="fa fa-circle fa-stack-2x text-white"></i>
                        <i class="fab fa-facebook-f fa-stack-1x text-centered text-black"></i>
                        </span>
                </li>

                <li class="mx-2">
                        <span class="fa-stack fa-1x rounded-full">
                        <i class="fa fa-circle fa-stack-2x text-white"></i>
                        <i class="fab fa-instagram fa-stack-1x text-centered text-black"></i>
                        </span>
                </li>
            </ul>
        </div>
        <div class="w-50 pt-2 text-white text-right px-3">
            <h2 class="xl:text-xl xs:text-base  font-normal">Partnering</h2>
            <p class=" w-50 ml-auto"><span class="opacity-70">List your business on</span> {{env('APP_NAME')}}</p>
            <div class="py-2">
                <a href="{{action('Affiliate\Auth\LoginController@showLoginForm')}}" class="no-underline inherit-color">
                    <button class="btn btn-default bg-transparent text-white px-4 rounded-full">Join</button>
                </a>
            </div>
        </div>
    </div>

    <div class="panel panel-default bg-black-darker w-100 min-h-auto h-auto xs:px-1 xs:mx-0">
        <div class="panel-body py-0 w-85 xs:w-90 mx-auto xs:px-1 ">
            <div class="text-center text-white mt-2 mr-auto text-sm xs:text-xs">
                © 2019 {{env('APP_NAME')}} · All rights reserved ·
            </div>
        </div>
    </div>
</div>
