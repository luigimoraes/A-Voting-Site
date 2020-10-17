const db = require('../model/partidoModel.js');
const parser = require('body-parser');
const fs = require('fs');

exports.selectPartidos = function(req, res){
	db.selectAllPartidos((jsonString) => {
		res.send(jsonString);
	});
};

exports.selectPartido = function(req, res){
	let requisition = req.body.partID;

	db.selectPartido(requisition, (result) => {
		res.send(result);
	});
};
