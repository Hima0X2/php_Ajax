<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AJAX Pagination Table</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }
        .pagination button {
            margin: 0 5px;
            padding: 5px 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<h2>AJAX Pagination Table</h2>

<table id="data-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
        </tr>
    </thead>
    <tbody>
        <!-- Rows will be injected here by JavaScript -->
    </tbody>
</table>

<div class="pagination" id="pagination-controls">
</div>

<script>
    const data = [
        { id: 1, name: 'Alice', age: 23 },
        { id: 2, name: 'Bob', age: 34 },
        { id: 3, name: 'Charlie', age: 29 },
        { id: 4, name: 'David', age: 21 },
        { id: 5, name: 'Eva', age: 19 },
        { id: 6, name: 'Frank', age: 32 },
        { id: 7, name: 'Grace', age: 25 },
        { id: 8, name: 'Hannah', age: 28 },
        { id: 9, name: 'Ian', age: 30 },
        { id: 10, name: 'Jack', age: 27 }
    ];

    function loadPage(page) {
        const rowsPerPage = 3;
        const startIndex = (page - 1) * rowsPerPage;
        const endIndex = startIndex + rowsPerPage;
        const pageData = data.slice(startIndex, endIndex);

        const tableBody = document.querySelector('#data-table tbody');
        tableBody.innerHTML = '';

        pageData.forEach(row => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${row.id}</td>
                <td>${row.name}</td>
                <td>${row.age}</td>`;
            tableBody.appendChild(tr);
        });
    }

    function createPagination() {
        const rowsPerPage = 3;
        const totalPages = Math.ceil(data.length / rowsPerPage);
        const paginationControls = document.getElementById('pagination-controls');
        paginationControls.innerHTML = '';

        for (let i = 1; i <= totalPages; i++) {
            const button = document.createElement('button');
            button.textContent = i;
            button.onclick = () => loadPage(i);
            paginationControls.appendChild(button);
        }
    }
    createPagination();
    loadPage(1);
</script>

</body>
</html>
