const db = require('./database.js');
const fs = require('fs');

function selectAllPartidos(func){
        db.getConnection((err, con) => {
                if(err) throw err;

                db.query('SELECT numLegenda, siglaPart FROM Partido', (err, results, fields) => {
                        fs.writeFile('./model/partidos.json', JSON.stringify(results), 'utf-8', (err, re) => {
                        	db.end();
				func();
			});
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
