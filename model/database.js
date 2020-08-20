//Need to grant privileges to user to be runned

const mysql = require("mysql");

let db = mysql.createPool({
	host: 'localhost',
	port: 3306,
	user: 'u0_a715',
	password: '',
	database: 'Eleitoral'
});

module.exports = db;
