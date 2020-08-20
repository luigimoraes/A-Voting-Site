const db = require('./database.js');

function vote(candId){
        db.getConnection((err, con) => {
                if(err) throw err;

                db.query('UPDATE Candidato SET totalVotos = totalVotos+1 WHERE candidatoID = ?', [candId], (err, res) => {
                        con.release();
                });
        });
}

module.exports = {
	vote
}
