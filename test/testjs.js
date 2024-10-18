// 硬编码用户数据
const users = [
    { id: "1", name: "apple", email: "apple@gmail.com" },
    { id: "2", name: "banana", email: "banana@gmail.com" },
    { id: "3", name: "catedited", email: "catedited@gmail.com" },
    { id: "4", name: "dog", email: "dog@gmail.com" },
    { id: "6", name: "newadd", email: "newadd@gmail.com" },
    { id: "7", name: "newaddviapost", email: "123@gmail.com" },
    { id: "22", name: "new5", email: "catedited@gmail.com" },
    { id: "23", name: "new10", email: "new3@gmail.com" },
    { id: "27", name: "editbypostman", email: "postman@gmail.com" },
    { id: "30", name: "newFINAL", email: "new3@gmail.com" },
    { id: "31", name: "PostmanPost", email: "postman@gmail.com" },
    { id: "32", name: "postmanpostput", email: "20241016@gmail.com" }
];

document.addEventListener("DOMContentLoaded", function() {
    // 初始化表格
    loadTable(users);

    // 搜索按钮事件监听器
    document.getElementById('searchButton').addEventListener('click', function() {
        let searchQuery = document.getElementById('searchField').value.trim();
        searchUsers(searchQuery);
    });
});

// 加载表格数据
function loadTable(users) {
    const tableBody = document.getElementById('studentsTableBody');
    tableBody.innerHTML = ''; // 清空表格

    users.forEach(user => {
        let newRow = `<tr>
            <td>${user.id}</td>
            <td>${user.name}</td>
            <td>${user.email}</td>
            <td>
                <button onclick="editRow(this)">Edit</button>
                <button onclick="deleteRow(this)">Delete</button>
            </td>
        </tr>`;
        tableBody.insertAdjacentHTML('beforeend', newRow);
    });
}

// 搜索用户
function searchUsers(query) {
    const filteredUsers = users.filter(user => {
        return user.id.includes(query) || user.name.includes(query) || user.email.includes(query);
    });

    loadTable(filteredUsers); // 重新加载表格
}
