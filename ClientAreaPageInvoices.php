<?php

if (!defined('WHMCS'))
    die('You cannot access this file directly.');

function filter_invoices_by_status($vars)
{
    $status = strtolower($_GET['status'] ?? 'unpaid');

    if ('all' == $status or !in_array($status, ['paid', 'unpaid', 'cancelled'])) {
        $status = '';
    }

    $invoices = $vars['invoices'];
    $activeStatus = $status ?: 'all';
    if ($status) {
        $legacyClient = new WHMCS\Client($vars['client']);
        [$orderby, $sort, $limit] = clientAreaTableInit("inv", "default", "ASC", $vars['numitems']);
        switch ($orderby) {
            case "date":
            case "duedate":
            case "total":
            case "status":
                break;
            case "invoicenum":
                $orderby = "invoicenum` " . $sort . ", `id";
                break;
            default:
                $orderby = "status` DESC, `duedate";
                break;
        }

        $invoice = new WHMCS\Invoice();
        $invoices = $invoice->getInvoices(ucfirst($status), $legacyClient->getID(), $orderby, $sort, $limit);


    }

    return [
        'invoices' => $invoices,
        'activeStatus' => $activeStatus,
    ];
}

add_hook('ClientAreaPageInvoices', 1, 'filter_invoices_by_status');
