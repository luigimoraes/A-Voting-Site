const db = require('../model/partidoModel.js');
const parser = require('body-parser');
const fs = require('fs');

exports.selectPartidos = function(req, res){
	db.selectAllPartidos(() => {
		let jsonFile = fs.readFileSync('./model/partidos.json', 'utf-8');
		let conv = JSON.parse(jsonFile);
		res.send(conv);
	});
};

exports.selectPartido = function(req, res){
	let requisition = req.body.partID;

	db.selectPartido(requisition, (result) => {
		res.send(result);
	});
};
