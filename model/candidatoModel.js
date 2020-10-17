const db = require('./database.js');
const fs = require('fs');

function insertCandidate(arr){
	db.getConnection((err, con) => {
		if(err) throw err;

		db.query('INSERT INTO Candidato(candidatoID, nomeCand, partidoID, passCand) VALUES (?)', [arr], (err, res) => {
			console.log(err);
           		con.release();
        	});
	});
}

function updateCandidate(arr){
	db.getConnection((err, con) => {
		if(err) throw err;

		console.log(arr);
		db.query('UPDATE Candidato SET ? WHERE candidatoID = ?', arr, (err, res) => {
			console.log(err);
			con.release();
        	});
	});
}

function selectCandidate(id, func){
	let prom = new Promise((resolve, reject) => {
		selectAllCandidates(resolve());
	});

	prom.then(() => {
		db.getConnection((err, con) => {
			if(err) throw err;

			let candJson = JSON.parse(fs.readFileSync('./model/allCandidatos.json', 'utf-8'));

			for(let cand of Object.values(candJson)){
				if(cand.candidatoID == id){
					func(cand);
				}
			}
		});
	});
}

function selectAllCandidates(callback){
	db.getConnection((err, con) => {
		if(err) throw err;
		db.query('SELECT candidatoID, nomeCand, totalVotos, partidoID FROM Candidato', (err, results) => {
			fs.writeFile('./model/allCandidatos.json', JSON.stringify(results), () => {
				if(typeof(callback) == "function"){
					 callback();
				}else{
					callback;
				}
			});
			con.release();
		});
	});
}

function deleteCandidate(id){
	db.getConnection((err, con) => {
		if(err) throw err;

		console.log("ID: ", id);
		db.query('DELETE FROM Candidato WHERE candidatoID = ?', [id], (err, res) => {
			console.log("Erro: ", err);
                	con.release();
        	});
	});
}

module.exports = {
	insertCandidate,
	updateCandidate,
	selectCandidate,
	selectAllCandidates,
	deleteCandidate
};
