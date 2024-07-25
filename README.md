# Invoice Filtering for WHMCS

## Introduction:

This PHP code provides a function to filter invoices within a WHMCS environment based on their status (paid, unpaid, cancelled, or all). This enhances user experience by allowing clients to quickly access specific invoices, reducing confusion and improving service retention.

## How it works:

1. The filter_invoices_by_status function filters invoices based on a provided status parameter.
2. The status parameter can be defined in the URL using the status query string (e.g., https://whmcs-panel-domain.com/clientarea.php?action=invoices&status=unpaid).
3. The filtered invoices are then displayed in the WHMCS client area.

## Prerequisites

* Installed and configured WHMCS
* Basic PHP and HTML knowledge

## Installation:

* Place the code within the `includes` directory of your WHMCS installation.

## Usage:

1. To view all invoices, users must include the status parameter with a value of `all` in the URL (e.
g., https://whmcs-panel-domain.com/clientarea.php?action=invoices&status=all).
2. To filter invoices by status, add the status parameter to the URL (e.g., status=unpaid for unpaid invoices).
3. Modify the 'clientareainvoices.tpl' to implement additional filtering options or display methods (e.
g., search select, separate tabs).

By using this code, you can significantly improve the invoice management experience for your clients within the WHMCS platform.