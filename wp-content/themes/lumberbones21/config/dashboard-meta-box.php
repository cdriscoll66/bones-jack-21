<?php

/**
 * Dashboard Meta Box
 *
 * Add a COLAB information meta box to the WordPress dashboard.
 *
 * @link https://developer.wordpress.org/reference/functions/add_meta_box/
 */
add_action('wp_dashboard_setup', function () {

    add_meta_box('colab-dashboard-meta-box', 'Digital Agency Information', function ($post, $args) {

        $image = '
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                viewBox="0 0 90 90" enable-background="new 0 0 90 90" xml:space="preserve"
                width="90" height="90" style="display: block;"
            >
                <rect fill="#FFFFFF" width="90" height="90"/>
                <path fill="#1C2654" d="M0,0v90h90V0H0z M58.7,66.3L41.6,56l3.1-3.1l10.4,6.4l1.4,1.1l-0.6-1.2L44.6,29.4L30.8,66.3l-4.1-1.6l15.3-41h5.2l16.1,42.5C63.4,66.3,58.7,66.3,58.7,66.3z"/>
            </svg>
        ';

        $name    = 'COLAB';
        $phone   = '804-433-3582';
        $email   = 'contact@teamcolab.com';
        $website = 'www.teamcolab.com';

        $website_url = sprintf(
            'https://%1$s/?%2$s',
            $website,
            http_build_query(array_filter([
                'utm_source'   => get_bloginfo('url'),
                'utm_medium'   => 'wp-admin',
                'utm_campaign' => 'dashboard-meta-box',
                'utm_term'     => '', // Optional
                'utm_content'  => '', // Optional
            ]))
        );

        $services = implode(', ', array_map(function ($a) { return sprintf('<span style="white-space: nowrap;">%s</span>', htmlentities($a)); }, [
            'Strategy',
            'Design',
            'Development',
            'Testing',
            'Deployment',
            'Support & Improvement',
        ]));

        $image_link = sprintf(
            '<a rel="noopener nofollow" target="_blank" href="%1$s" style="display: block; float: left; margin-bottom: 8px; margin-right: 8px;">%2$s</a>',
            $website_url,
            $image
        );

        $name_link = sprintf(
            '<a rel="noopener nofollow" target="_blank" href="%1$s" style="white-space: nowrap; text-decoration: none;">%2$s</a>',
            $website_url,
            $name
        );

        $phone_link = sprintf(
            '<a rel="noopener nofollow" href="%1$s" style="white-space: nowrap; text-decoration: none;">%2$s</a>',
            sprintf('tel:1%s', preg_replace('/[^0-9]/s', '', $phone)), // Strip non-numeric characters
            $phone
        );

        $email_link = sprintf(
            '<a rel="noopener nofollow" target="_blank" href="mailto:%1$s" style="white-space: nowrap; text-decoration: none;">%1$s</a>',
            $email
        );

        $website_link = sprintf(
            '<a rel="noopener nofollow" target="_blank" href="%1$s" style="white-space: nowrap; text-decoration: none;">%2$s</a>',
            $website_url,
            $website
        );

        $description = sprintf(
            'This website was built by the team at %1$s. When you have questions, need support, or don\'t know what to do next, please give us a call %2$s or email %3$s.',
            $name_link,
            $phone_link,
            $email_link
        );

        $style = '
            <style>
            #colab-dashboard-meta-box .postbox-header {
                border-color: #1C2654;
                background-color: #1C2654;
            }
            #colab-dashboard-meta-box .hndle,
            #colab-dashboard-meta-box .toggle-indicator,
            #colab-dashboard-meta-box .handle-order-higher,
            #colab-dashboard-meta-box .handle-order-lower {
                color: white;
            }
            #colab-dashboard-meta-box .handle-order-higher[aria-disabled=true],
            #colab-dashboard-meta-box .handle-order-lower[aria-disabled=true] {
                opacity: 0.6;
            }
            #colab-dashboard-meta-box .inside {
                margin-top: 0;
                padding-top: 12px;
                border: 1px solid #1C2654;
                border-top: 0;
            }
            </style>
        ';

        /** Table Template */
        $output = '';
        $output .= $style;
        $output .= $image_link;
        $output .= '<table>';
        $output .= '<tbody>';
        $output .= sprintf('<tr><th align="left" valign="top">Name:</th><td>%s</td></tr>', $name_link);
        $output .= sprintf('<tr><th align="left" valign="top">Phone:</th><td>%s</td></tr>', $phone_link);
        $output .= sprintf('<tr><th align="left" valign="top">Email:</th><td>%s</td></tr>', $email_link);
        $output .= sprintf('<tr><th align="left" valign="top">URL:</th><td>%s</td></tr>', $website_link);
        // $output .= sprintf('<tr><th align="left" valign="top">Services:</th><td>%s</td></tr>', $services);
        $output .= '</tbody>';
        $output .= '</table>';

        $output .= sprintf('<p><strong style="font-weight: 700;">Services:</strong> %s</p>', $services);

        $output .= sprintf('<p>%s</p>', $description);

        echo $output;
    }, 'dashboard', 'normal', 'high'); // $args
}, 1);
