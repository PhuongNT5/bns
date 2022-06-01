<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

class EBHelpers
{
    /**
     * Filter Blocks
     */
    public static function filter_blocks($block)
    {
        return isset($block['visibility']) ? $block['visibility'] : false;
    }

    /**
     * Disable Nonce
     */
    public static function disabling_nonce()
    {
        return wp_create_nonce('essential_disabling_nonce');
    }

    /**
     * Get FluentForms List
     *
     * @return array
     */
    public static function get_fluent_forms_list()
    {

        $options = array();

        if (defined('FLUENTFORM')) {
            global $wpdb;
            $options[0]['value'] = '';
            $options[0]['label'] = __('Select a form', 'essential-blocks');
            $result = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}fluentform_forms");
            if ($result) {
                foreach ($result as $key => $form) {
                    $options[$key + 1]['value'] = $form->id;
                    $options[$key + 1]['label'] = $form->title;
                    $options[$key + 1]['attr'] = self::get_form_attr($form->id);
                }
            }
        }
        return $options;
    }

    /**
     * Get Form Attribute
     */
    public static function get_form_attr($form_id)
    {
        return  \FluentForm\App\Helpers\Helper::getFormMeta($form_id, 'template_name');
    }

    /**
     * Get WPForms List
     *
     * @return array
     */
    public static function get_wpforms_list()
    {
        $options = array();

        if (class_exists('\WPForms\WPForms')) {
            $args = array(
                'post_type' => 'wpforms',
                'posts_per_page' => -1,
            );

            $contact_forms = get_posts($args);

            if (!empty($contact_forms) && !is_wp_error($contact_forms)) {
                $options[0]['value'] = '';
                $options[0]['label'] = esc_html__('Select a WPForm', 'essential-blocks');
                foreach ($contact_forms as $key => $post) {
                    $options[$key + 1]['value'] = $post->ID;
                    $options[$key + 1]['label'] = $post->post_title;
                }
            }
        } else {
            $options[0] = esc_html__('Create a Form First', 'essential-blocks');
        }

        return $options;
    }
}
