<x-main>
    <div id="tableExample4" data-list='{"valueNames":["name","email","payment"],"filter":{"key":"payment"}}'>
        <div class="row justify-content-end g-0">
            <div class="col-auto px-3"><select class="form-select form-select-sm mb-3" aria-label="Bulk actions" data-list-filter="data-list-filter">
                    <option selected="" value="">Select payment status</option>
                    <option value="Pending">Pending</option>
                    <option value="Success">Success</option>
                    <option value="Blocked">Blocked</option>
                </select></div>
        </div>
        <div class="table-responsive scrollbar">
            <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden">
                <thead class="bg-200 text-900">
                <tr>
                    <th class="sort pe-1 align-middle white-space-nowrap" data-sort="name">Customer</th>
                    <th class="sort pe-1 align-middle white-space-nowrap" data-sort="email">Email</th>
                    <th class="sort align-middle white-space-nowrap text-end pe-4" data-sort="payment">Payment</th>
                </tr>
                </thead>
                <tbody class="list" id="table-purchase-body">
                <tr class="btn-reveal-trigger">
                    <th class="align-middle white-space-nowrap name"><a href="../../app/e-commerce/customer-details.html">Sylvia Plath</a></th>
                    <td class="align-middle white-space-nowrap email">john@gmail.com</td>
                    <td class="align-middle text-end fs-0 white-space-nowrap payment"><span class="badge badge rounded-pill badge-subtle-success">Success<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span></td>
                </tr>
                <tr class="btn-reveal-trigger">
                    <th class="align-middle white-space-nowrap name"><a href="../../app/e-commerce/customer-details.html">Homer</a></th>
                    <td class="align-middle white-space-nowrap email">sylvia@mail.ru</td>
                    <td class="align-middle text-end fs-0 white-space-nowrap payment"><span class="badge badge rounded-pill badge-subtle-warning">Pending<span class="ms-1 fas fa-stream" data-fa-transform="shrink-2"></span></span></td>
                </tr>
                <tr class="btn-reveal-trigger">
                    <th class="align-middle white-space-nowrap name"><a href="../../app/e-commerce/customer-details.html">Edgar Allan Poe</a></th>
                    <td class="align-middle white-space-nowrap email">edgar@yahoo.com</td>
                    <td class="align-middle text-end fs-0 white-space-nowrap payment"><span class="badge badge rounded-pill badge-subtle-secondary">Blocked<span class="ms-1 fas fa-ban" data-fa-transform="shrink-2"></span></span></td>
                </tr>
                <tr class="btn-reveal-trigger">
                    <th class="align-middle white-space-nowrap name"><a href="../../app/e-commerce/customer-details.html">William Butler Yeats</a></th>
                    <td class="align-middle white-space-nowrap email">william@gmail.com</td>
                    <td class="align-middle text-end fs-0 white-space-nowrap payment"><span class="badge badge rounded-pill badge-subtle-success">Success<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span></td>
                </tr>
                <tr class="btn-reveal-trigger">
                    <th class="align-middle white-space-nowrap name"><a href="../../app/e-commerce/customer-details.html">Rabindranath Tagore</a></th>
                    <td class="align-middle white-space-nowrap email">tagore@twitter.com</td>
                    <td class="align-middle text-end fs-0 white-space-nowrap payment"><span class="badge badge rounded-pill badge-subtle-warning">Pending<span class="ms-1 fas fa-stream" data-fa-transform="shrink-2"></span></span></td>
                </tr>
                <tr class="btn-reveal-trigger">
                    <th class="align-middle white-space-nowrap name"><a href="../../app/e-commerce/customer-details.html">Emily Dickinson</a></th>
                    <td class="align-middle white-space-nowrap email">emily@gmail.com</td>
                    <td class="align-middle text-end fs-0 white-space-nowrap payment"><span class="badge badge rounded-pill badge-subtle-secondary">Blocked<span class="ms-1 fas fa-ban" data-fa-transform="shrink-2"></span></span></td>
                </tr>
                <tr class="btn-reveal-trigger">
                    <th class="align-middle white-space-nowrap name"><a href="../../app/e-commerce/customer-details.html">Giovanni Boccaccio</a></th>
                    <td class="align-middle white-space-nowrap email">giovanni@outlook.com</td>
                    <td class="align-middle text-end fs-0 white-space-nowrap payment"><span class="badge badge rounded-pill badge-subtle-warning">Pending<span class="ms-1 fas fa-stream" data-fa-transform="shrink-2"></span></span></td>
                </tr>
                <tr class="btn-reveal-trigger">
                    <th class="align-middle white-space-nowrap name"><a href="../../app/e-commerce/customer-details.html">Oscar Wilde</a></th>
                    <td class="align-middle white-space-nowrap email">oscar@hotmail.com</td>
                    <td class="align-middle text-end fs-0 white-space-nowrap payment"><span class="badge badge rounded-pill badge-subtle-success">Success<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span></td>
                </tr>
                <tr class="btn-reveal-trigger">
                    <th class="align-middle white-space-nowrap name"><a href="../../app/e-commerce/customer-details.html">John Doe</a></th>
                    <td class="align-middle white-space-nowrap email">doe@gmail.com</td>
                    <td class="align-middle text-end fs-0 white-space-nowrap payment"><span class="badge badge rounded-pill badge-subtle-success">Success<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span></td>
                </tr>
                <tr class="btn-reveal-trigger">
                    <th class="align-middle white-space-nowrap name"><a href="../../app/e-commerce/customer-details.html">Emma Watson</a></th>
                    <td class="align-middle white-space-nowrap email">emma@gmail.com</td>
                    <td class="align-middle text-end fs-0 white-space-nowrap payment"><span class="badge badge rounded-pill badge-subtle-warning">Pending<span class="ms-1 fas fa-stream" data-fa-transform="shrink-2"></span></span></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-main>
