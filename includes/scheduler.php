<?php
if (!defined('ABSPATH')) exit;

// Hook into WordPress cron
add_action('houzez_crm_send_scheduled_emails', 'houzez_crm_send_daily_emails');

// Function to send emails to all leads
function houzez_crm_send_daily_emails() {
    $leads = houzez_crm_get_leads(); // Fetch all leads

    foreach ($leads as $lead) {
        $matched_data = houzez_crm_get_matched_data($lead->lead_id); // Fetch matched data
        if (!empty($matched_data)) {
            houzez_crm_send_email_to_lead($lead, $matched_data); // Send email
        }
    }
}
