# Gymeo CRM
<p>
    Gymeo Client Relation Management is a software which allows gym owners to manage all their needs such as
    <ul>
        <li>Plans</li>
        <li>Subscriptions</li>
        <li>Members</li>
        <li>Vendors</li>
        <li>Payments</li>
        <li>Credits</li>
        <li>Expenses</li>
        <li>Memberships</li>
        <li>Staves / Teams</li>
    </ul>
</p>

# Installation
<p>To install this software, make sure you run these commands</p>
<ul>
    <li>
        <code>composer install</code>
    </li>
    <li>
        <code>copy .env.example .env</code>
    </li>
    <li>
        Fill the database information on the new file (.env)
    </li>
    <li>
        <code>php artisan key:generate</code>
    </li>
    <li>
        <code>php artisan migrate</code>
    </li>
    <li>
        <code>php artisan storage:link</code>
    </li>
    <li>
        <code>php artisan serve --port=3000</code>
    </li>
    <li>
        now you can visit localhost:3000 and see the project
    </li>
</ul>