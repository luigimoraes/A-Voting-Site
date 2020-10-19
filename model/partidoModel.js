const db = require('./database.js');
const fs = require('fs');

function selectAllPartidos(func){
        db.getConnection((err, con) => {
                if(err) throw err;

                db.query('SELECT numLegenda, siglaPart FROM Partido', (err, results, fields) => {
			func(JSON.stringify(results));
			db.end();
                });
        });
}

function selectPartido(id, func){
	db.getConnection((err, con) => {
		if(err) throw err;

		let partJson = JSON.parse(fs.readFileSync('./model/partidos.json', 'utf-8'));

		for(let part of Object.values(partJson)){
			if(part.numLegenda == id){
				func(part);
			}
		}
	});
}

module.exports = {
	selectAllPartidos,
	selectPartido
};
