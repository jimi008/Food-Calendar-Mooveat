<?php
/*
 * This is the page users will see logged out.
 * You can edit this, but for upgrade safety you should copy and modify this file into your template folder.
 * The location from within your template folder is plugins/login-with-ajax/ (create these directories if they don't exist)
*/
?>
<div class="lwa lwa-divs-only">
    <span class="lwa-status"></span>
    <form class="lwa-form" action="<?php echo esc_attr(LoginWithAjax::$url_login); ?>" method="post">
        <div class="lwa-username">
            <label><?php esc_html_e( 'Username','login-with-ajax' ) ?></label>
            <input type="text" name="log" id="lwa_user_login" class="input" placeholder="Identifiant" autocomplete="off"/>
        </div>

        <div class="lwa-password">
            <label><?php esc_html_e( 'Password','login-with-ajax' ) ?></label>
            <input type="password" name="pwd" id="lwa_user_pass" class="input" placeholder="Mot de passe" autocomplete="off"/>
        </div>

        <div class="lwa-login_form">
            <?php do_action('login_form'); ?>
        </div>

        <div class="lwa-links">
            <?php if( !empty($lwa_data['remember']) ): ?>
                <a class="mve-links-remember" href="<?php echo esc_attr(LoginWithAjax::$url_remember); ?>" title="<?php esc_attr_e('Password Lost and Found','login-with-ajax') ?>"><?php esc_attr_e('Lost your password?','login-with-ajax') ?></a>
            <?php endif; ?>
        </div>

        <div class="lwa-submit-button">
            <input type="submit" name="wp-submit" class="mooveat-button-green" id="lwa_wp-submit" value="<?php esc_attr_e('Log In','login-with-ajax'); ?>" tabindex="100" />
            <input type="hidden" name="lwa_profile_link" value="<?php echo esc_attr($lwa_data['profile_link']); ?>" />
            <input type="hidden" name="login-with-ajax" value="login" />
            <?php if( !empty($lwa_data['redirect']) ): ?>
                <input type="hidden" name="redirect_to" value="<?php echo esc_url($lwa_data['redirect']); ?>" />
            <?php endif; ?>
        </div>

        <div class="lwa-links">
            <input name="rememberme" type="checkbox" class="lwa-rememberme mooveat-checkbox" value="forever" id="remember-user-input" /> <label for="remember-user-input" class="show-label"><?php esc_html_e( 'Remember Me','login-with-ajax' ) ?></label>
        </div>

        <div class="mve-direct-access">
            <a href="#">ACCÈS DIRECT AU SITE</a>
        </div>

        <div class="lwa-links stick-to-bottom">
            <?php if ( get_option('users_can_register') && !empty($lwa_data['registration']) ) : ?>
                <a href="<?php echo esc_attr(LoginWithAjax::$url_register); ?>" class="mve-links-register-inline"><?php esc_html_e('Créer votre compte','login-with-ajax'); ?></a> | <a class="facebook-link" href="https://mooveat.io/?loginFacebook=1&redirect=https%3A%2F%2Fmooveat.io%2F" onclick="window.location = 'https://mooveat.io/?loginFacebook=1&redirect='+window.location.href; return false;">Connexion avec Facebook</a>
            <?php endif; ?>
        </div>

    </form>
    <?php if( !empty($lwa_data['remember']) && $lwa_data['remember'] == 1 ): ?>
        <form class="lwa-remember" action="<?php echo esc_attr(LoginWithAjax::$url_remember); ?>" method="post" style="display:none;">
            <p><?php esc_html_e("Forgotten Password",'login-with-ajax'); ?></p>
            <div class="lwa-remember-email">
                <?php $msg = __("Enter username or email",'login-with-ajax'); ?>
                <input type="text" name="user_login" id="lwa_user_remember" value="<?php echo esc_attr($msg); ?>" onfocus="if(this.value == '<?php echo esc_attr($msg); ?>'){this.value = '';}" onblur="if(this.value == ''){this.value = '<?php echo esc_attr($msg); ?>'}" autocomplete="off"/>
                <?php do_action('lostpassword_form'); ?>
            </div>
            <div class="lwa-submit-button">
                <input type="submit" class="mooveat-button-orange" value="<?php esc_attr_e("Get New Password", 'login-with-ajax'); ?>" />
                <a href="#" class="mve-links-remember-cancel"><?php esc_attr_e("Cancel", 'login-with-ajax'); ?></a>
                <input type="hidden" name="login-with-ajax" value="remember" />
            </div>
        </form>
    <?php endif; ?>
    <?php if ( get_option('users_can_register') && !empty($lwa_data['registration']) && $lwa_data['registration'] == 1 ) : ?>
        <div class="lwa-register" >
            <form class="registerform" action="<?php echo esc_attr(LoginWithAjax::$url_register); ?>" method="post">
                <p style="display: none;"><?php esc_html_e('Register For This Site','login-with-ajax'); ?></p>
                <div class="profile-selection">
                    <span class="orange-text">Vous êtes un :&nbsp;&nbsp;</span>
                    <input type="radio" name="mve_user_type" value="1" id="radio-1-user-type" checked><label for="radio-1-user-type"><span></span>Particulier</label>&nbsp;
                    <input type="radio" name="mve_user_type" value="2" id="radio-2-user-type"><label for="radio-2-user-type"><span></span>Professionnel</label>
                </div>
                <div class="activity-selection">
                    <select class="custom-select" id="mve-activity-field" name="mve_activity_field">
                    <?php
                        $pro_activity_fields = array(0=>"Domaine d'activité",1=>'Producteur', 2=>'Point de vente', 3=>'Restaurateur', 4=>'Prestataire logistique');
                        foreach ( $pro_activity_fields as $activity_id => $activity_field ) {
                            printf( '<option value="%1$s" %3$s>%2$s</option>', $activity_id, $activity_field ,selected( 1, $activity_id, false ) );
                        }
                    ?>
                    </select>
                </div>
                <div class="lwa-username">
                    <?php $msg = __('Username','login-with-ajax'); ?>
                    <input type="text" name="user_login" id="user_login"  value="<?php echo esc_attr($msg); ?>" onfocus="if(this.value == '<?php echo esc_attr($msg); ?>'){this.value = '';}" onblur="if(this.value == ''){this.value = '<?php echo esc_attr($msg); ?>'}" />
                </div>
                <div class="lwa-email">
                    <?php $msg = __('E-mail','login-with-ajax'); ?>
                    <input type="text" name="user_email" id="user_email"  value="<?php echo esc_attr($msg); ?>" onfocus="if(this.value == '<?php echo esc_attr($msg); ?>'){this.value = '';}" onblur="if(this.value == ''){this.value = '<?php echo esc_attr($msg); ?>'}"/>
                </div>

                <div class="lwa-links">
                    <input name="accept-mooveat-cgu" type="checkbox" class="mooveat-checkbox" value="true" id="accept-mooveat-cgu" /> <label for="accept-mooveat-cgu" class="show-label">En m'inscrivant j'accepte les CGU</label>
                </div>

                <?php
                //If you want other plugins to play nice, you need this:
                do_action('register_form');

                /*global $wp_filter;
                error_log( print_r($wp_filter, TRUE) );*/
                ?>
                <p class="lwa-submit-button">
                    <?php esc_html_e('A password will be e-mailed to you.','login-with-ajax') ?>
                    <input type="submit" name="wp-submit" id="wp-submit" class="button-primary mooveat-button-orange disabled" value="<?php esc_attr_e('CRÉER VOTRE COMPTE', 'login-with-ajax'); ?>" tabindex="100" />
                    <a href="#" class="mve-links-register-inline-cancel"><?php esc_html_e("Cancel", 'login-with-ajax'); ?></a>
                    <input type="hidden" name="login-with-ajax" value="register" />
                </p>
            </form>
        </div>
    <?php endif; ?>
</div>