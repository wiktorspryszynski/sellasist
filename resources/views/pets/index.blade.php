<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petstore</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: sans-serif; background: #111827; color: #f9fafb; padding: 2rem; min-height: 100vh; display: flex; flex-direction: column; }
        h1 { margin-bottom: 1.5rem; font-size: 1.5rem; }
        .toolbar { display: flex; justify-content: flex-end; margin-bottom: 1rem; }
        .btn { display: inline-block; padding: .45rem .9rem; border: none; border-radius: 4px; font-size: .875rem; cursor: pointer; text-decoration: none; }
        .btn-primary { background: #2563eb; color: #fff; }
        .btn-primary:hover { background: #1d4ed8; }
        .btn-warning { background: #f59e0b; color: #fff; }
        .btn-warning:hover { background: #d97706; }
        .btn-danger { background: #dc2626; color: #fff; }
        .btn-danger:hover { background: #b91c1c; }
        table { width: 100%; border-collapse: collapse; background: #1f2937; border-radius: 6px; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,.4); }
        thead { background: #111827; color: #f9fafb; }
        th, td { padding: .75rem 1rem; text-align: left; font-size: .875rem; color: #f9fafb; }
        tbody tr:not(:last-child) { border-bottom: 1px solid #374151; }
        tbody tr:hover { background: #374151; }
        main { flex: 1; }
        footer { margin-top: 2rem; text-align: center; font-size: .8rem; color: #6b7280; }
        .badge { display: inline-block; padding: .2rem .6rem; border-radius: 99px; font-size: .75rem; font-weight: 600; }
        .badge-available { background: #d1fae5; color: #065f46; }
        .badge-pending   { background: #fef3c7; color: #92400e; }
        .badge-sold      { background: #fee2e2; color: #991b1b; }
        .actions { display: flex; gap: .5rem; }
    </style>
</head>
<body>

<main>
<h1>Petstore</h1>

<div class="toolbar">
    <a href="#" class="btn btn-primary">+ Add Pet</a>
</div>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Category</th>
            <th>Tags</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Rex</td>
            <td>Dogs</td>
            <td>friendly, trained</td>
            <td><span class="badge badge-available">available</span></td>
            <td class="actions">
                <a href="#" class="btn btn-warning">Edit</a>
                <a href="#" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Whiskers</td>
            <td>Cats</td>
            <td>indoor</td>
            <td><span class="badge badge-pending">pending</span></td>
            <td class="actions">
                <a href="#" class="btn btn-warning">Edit</a>
                <a href="#" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>Tweety</td>
            <td>Birds</td>
            <td>—</td>
            <td><span class="badge badge-sold">sold</span></td>
            <td class="actions">
                <a href="#" class="btn btn-warning">Edit</a>
                <a href="#" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    </tbody>
</table>

</main>

<footer>Wiktor Spryszyński - zadanie rekrutacyjne</footer>

</body>
</html>
