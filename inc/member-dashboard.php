<?php 
add_action( 'add_meta_boxes', 'cd_meta_box_add' );
function cd_meta_box_add()
{
    add_meta_box( 'updated-member-dashboard', 'Member Dashboard Additional Option', 'wnhq_updated_dashboard', 'page', 'normal', 'high' );
}




function wnhq_updated_dashboard( $post ) {
    $values = get_post_custom( $post->ID );
    $selected = isset( $values['page_member_dashboard'] ) ? esc_attr( $values['page_member_dashboard'][0] ) : 'empty';
    $kb_url = isset( $values['page_member_knowledgebase'] ) ? esc_attr( $values['page_member_knowledgebase'][0] ) : '';

    // We'll use this nonce field later on when saving.
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
    ?>

    <h2>Options inserted below will only apply if the template selected is <strong>Updated Dashboard</strong></h2>
     
    <p style="margin-left: 15px;">
        <label for="page_member_dashboard">Select which widget would you like to display?</label><br>
        <select name="page_member_dashboard" id="page_member_dashboard">
            <?php echo select_sidebars($selected); ?>
        </select>
    </p>
    <p style="margin-left: 15px;">
        <label for="page_member_knowledgebase">Enter URL to Change Default Knowlege Base?</label><br>
        <input type="text" name="page_member_knowledgebase" id="page_member_knowledgebase" value="<?php echo $kb_url; ?>">
    </p>

    <p style="margin-left: 15px;">
        <label for="page_profile_url">Enter URL to Change profile page in next to the kb.</label><br>
        <input type="text" name="page_profile_url" id="page_profile_url" value="<?php echo $kb_url; ?>">
    </p>
    <?php    
}


add_action( 'save_post', 'qnhq_save_updated_dashboard' );
function qnhq_save_updated_dashboard( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;
     
    // now we can actually save the data
    $allowed = array( 
        'a' => array( // on allow a tags
            'href' => array() // and those anchors can only have href attribute
        )
    );
     
    // Make sure your data is set before trying to save it
    // if( isset( $_POST['my_meta_box_text'] ) )
    //     update_post_meta( $post_id, 'my_meta_box_text', wp_kses( $_POST['my_meta_box_text'], $allowed ) );
         
    if( isset( $_POST['page_member_dashboard'] ) )
        update_post_meta( $post_id, 'page_member_dashboard', esc_attr( $_POST['page_member_dashboard'] ) );

    if( isset( $_POST['page_member_knowledgebase'] ) )
        update_post_meta( $post_id, 'page_member_knowledgebase', esc_attr( $_POST['page_member_knowledgebase'] ) );

    if( isset( $_POST['page_profile_url'] ) )
        update_post_meta( $post_id, 'page_profile_url', esc_attr( $_POST['page_profile_url'] ) );
         
    // This is purely my personal preference for saving check-boxes
    //$chk = isset( $_POST['my_meta_box_check'] ) && $_POST['page_member_dashboard'] ? 'on' : 'off';
    //update_post_meta( $post_id, 'my_meta_box_check', $chk );
}


function rh_get_widget_data_for_all_sidebars() {
    global $wp_registered_sidebars;
    $output = array();
    foreach ( $wp_registered_sidebars as $sidebar ) {
        if ( empty( $sidebar['name'] ) ) {
            continue;
        }
        $sidebar_name = $sidebar['name'];
        $output[ $sidebar_name ] = $sidebar['id'];
    }
    return $output;
}

function select_sidebars($selected) {
    $select_sidebars = "";
    foreach (rh_get_widget_data_for_all_sidebars() as $key => $value) {
        $select_sidebars .= '<option value="'.$value.'"' .  selected($selected, $value) . '>'.$key.'</option>';
    }

    return $select_sidebars;
}