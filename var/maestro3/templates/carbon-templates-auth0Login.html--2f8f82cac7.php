<?php
// source: /home/framenetbr/public_html/webtooldev/apps/webtool/public/themes/carbon/templates/auth0Login.html

use Latte\Runtime as LR;

class Template2f8f82cac7 extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
		?><script src=<?php echo LR\Filters::escapeHtmlAttrUnquoted(LR\Filters::safeUrl($manager->getStaticURL($manager->getApp(), 'scripts/auth0/lock.min.js'))) /* line 1 */ ?>></script>

<script>
    var AUTH0_CLIENT_ID = <?php echo LR\Filters::escapeJs($data->client_id) /* line 4 */ ?>;
    var AUTH0_DOMAIN = <?php echo LR\Filters::escapeJs($data->domain) /* line 5 */ ?>;
    var AUTH0_CALLBACK_URL = <?php echo LR\Filters::escapeJs($data->redirect_uri) /* line 6 */ ?>;

    $(document).ready(function () {
        var lock = new Auth0Lock(AUTH0_CLIENT_ID, AUTH0_DOMAIN, {
            auth: {
                redirectUrl: AUTH0_CALLBACK_URL
                , responseType: 'code'
                , params: {
                    scope: 'openid'
                }
            }
        });

        $('.btnAuth0').click(function (e) {
            e.preventDefault();
            lock.show();
        });

        $('.btn-logout').click(function (e) {
            e.preventDefault();
            window.location = <?php echo LR\Filters::escapeJs($manager->getAppURL($manager->getApp(), 'auth/login/logout')) /* line 26 */ ?>;
        });
    });
</script>

<style>


    .welcome {
        font-size: 2rem;
        display: block;
        color: white;
    }

    .webtool {
        font-size: 5.75rem;
        display: block;
        color: white;
    }
    .homepage-img--main, .homepage-img--wrapper {
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        right: 0;
        z-index:1;
        background-image: url("<?php echo LR\Filters::escapeCss($manager->getThemeURL()) /* line 52 */ ?>images/home_background.jpg");
    }

    .homepage--img--overlay {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background: #000;
        opacity: .6;
        z-index:1;
    }

    .homepage--dots {
        position: absolute;
        z-index: 2;
        width: 100%;
        height: 50%;
        background-image: url("<?php echo LR\Filters::escapeCss($manager->getThemeURL()) /* line 71 */ ?>icons/carbon/dot.svg");
        background-repeat: repeat;
        background-size: 16px;
        opacity: .6;
    }
        .container--homepage {
        /*background: #171717;
        color: #fff;
        */
        }

    .text1 {
        width: 100%;
        height: 50%;
        position: absolute;
        top: 0;
        right: 0;
        z-index:3;
        padding: 3rem;
    }

    .text2 {
        position: absolute;
        top: calc(50vh);
        right: 0;
        width: 100%;
        height: 50%;
        z-index:3;
        padding: 3rem;
    }

    .btnAuth0 {
        font-size: 1.75rem;
        padding: 16px;
        letter-spacing: 1px;
        border: 2px solid white;
        background-color: transparent;;
    }
    .btnAuth0 a {
        color: white;
        text-decoration: none;
    }

</style>
<div class="container--homepage">

    <span class="homepage--dots"></span>
    <div class="homepage-img--main">
    <div class="homepage-img--wrapper">
        <!--
        <img src="<?php echo LR\Filters::escapeHtmlComment($manager->getThemeURL()) /* line 121 */ ?>images/home_background.jpg">
        -->
    </div>
        <div class="homepage--img--overlay"></div>
</div>
    <div class="text1">
        <span class="welcome">Welcome to</span>
        <span class="webtool">FNBr Webtool</span>
    </div>
    <div class="text2">
        <button  class="btnAuth0">
            <a>SignIn via Auth0</a>
        </button>
    </div>
</div>
<!--
<div class="containerLogin">
    <div class="login-page">
        <div class="login-box auth0-box before">
            <a class="btn btn-primary btn-lg btn-login btn-block">SignIn</a>
        </div>
    </div>
</div>
--><?php
		return get_defined_vars();
	}

}
