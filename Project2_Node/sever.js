const express = require('express');
const app = express();
const port = process.env.PORT || 3000;

// --- PHẦN BACKEND ---
// Biến môi trường Database (DB_URI)
const dbUri = process.env.DB_URI || "Chưa cấu hình";
let dbStatus = "⚠️ Đang chạy Local (Chưa kết nối MongoDB)";

if (process.env.DB_URI) {
    dbStatus = "✅ Đã cấu hình kết nối MongoDB Cloud";
}

// Dữ liệu giả lập (Mock Data)
const users = [
    { id: 1, name: "Nguyen Van A", role: "Admin" },
    { id: 2, name: "Tran Thi B", role: "User" },
    { id: 3, name: "Le Van C", role: "User" }
];

// --- PHẦN FRONTEND ---
app.get('/', (req, res) => {
    let userListHtml = users.map(u => `<li><b>${u.name}</b> (${u.role})</li>`).join('');

    res.send(`
        <!DOCTYPE html>
        <html>
        <head>
            <title>Project 2 - Node.js</title>
            <style>
                body { font-family: 'Segoe UI', sans-serif; background-color: #282c34; color: white; text-align: center; padding-top: 50px; }
                .box { border: 2px solid #61dafb; padding: 20px; display: inline-block; border-radius: 10px; background: #20232a; min-width: 400px;}
                h1 { color: #61dafb; }
                ul { text-align: left; margin: auto; width: fit-content; }
                .status { margin-bottom: 20px; font-size: 0.9em; color: #aaa; }
            </style>
        </head>
        <body>
            <div class="box">
                <h1>🚀 PROJECT 2: NODE.JS + MONGODB</h1>
                <p class="status">DB Connection String: ${dbUri.substring(0, 15)}...</p>
                <p>Status: <b>${dbStatus}</b></p>
                <hr style="border-color: #444;">
                <h3>User List:</h3>
                <ul>${userListHtml}</ul>
            </div>
        </body>
        </html>
    `);
});

app.listen(port, () => {
    console.log(`App is running at http://localhost:${port}`);
});