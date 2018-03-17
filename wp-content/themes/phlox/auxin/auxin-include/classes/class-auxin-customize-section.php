<?php
/**
 * A custom customizer section for auxin framework
 *
 * 
 * @package    Auxin
 * @author     averta (c) 2014-2018
 * @link       http://averta.net
 */
class Auxin_Customize_Section extends WP_Customize_Section {

    public $section;
    public $preview_link;

    public $type = 'auxin_section';

    /**
     * Add preview link to js params
     *
     * @return json data
     */
    public function json() {
        $json = parent::json();
        $json['preview_link'] = $this->preview_link;
        return $json;
    }

    /**
     * Renders output for section title and description
     *
     * @return void
     */
    function render_template() {
        ?>
        <li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }}">
            <h3 class="accordion-section-title" tabindex="0">
                {{ data.title }}
                <span class="screen-reader-text"><?php _e( 'Press return or enter to open this section', 'phlox' ); ?></span>
            </h3>
            <ul class="accordion-section-content">
                <li class="customize-section-description-container section-meta <# if ( data.description_hidden ) { #>customize-info<# } #>">
                    <div class="customize-section-title">
                        <button class="customize-section-back" tabindex="-1">
                            <span class="screen-reader-text"><?php _e( 'Back', 'phlox' ); ?></span>
                        </button>
                        <h3>
                            <span class="customize-action">
                                {{{ data.customizeAction }}}
                            </span>
                            {{ data.title }}
                        </h3>
                        <# if ( data.description && data.description_hidden ) { #>
                            <button type="button" class="customize-help-toggle dashicons dashicons-editor-help" aria-expanded="false"><span class="screen-reader-text"><?php _e( 'Help', 'phlox' ); ?></span></button>
                            <div class="description customize-section-description">
                                {{{ data.description }}}
                            </div>
                        <# } #>
                    </div>

                    <# if ( data.description && ! data.description_hidden ) { #>
                        <div class="description customize-section-description">
                            <!-- @auxin start -->
                            <# if ( data.preview_link ) { #>
                            <a class="aux-customizer-section-preview-link" href="{{{ data.preview_link }}}">
                            <# } #>
                            {{{ data.description }}}
                            <# if ( data.preview_link ) { #>
                            </a>
                            <# } #>
                            <!-- @auxin end -->
                        </div>
                    <# } #>
                </li>
            </ul>
        </li>
        <?php
    }
}
