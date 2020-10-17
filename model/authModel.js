const db = require('./database.js');
const fs = require('fs');

function authCandidato(id, pass, func){
        db.getConnection((err, con) => {
                if(err) throw err;

                db.query('SELECT 1 FROM Candidato WHERE candidatoID = ? AND passCand = ?', [id, pass], (err, results) => {
                        //fs.writeFileSync('./model/authResults.json', JSON.stringify(results));
			func(results[0]);
                        con.release();
                });
        });
}

function authEleitor(titulo, func){
	//foi mal. to sem ideias de
	//como  autenticar eleitor :/
	func();
}

module.exports = {
	authCandidato,
	authEleitor
};
