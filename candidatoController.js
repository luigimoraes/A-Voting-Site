const db = require('../model/candidatoModel.js');
const parser = require('body-parser');
const fs = require('fs');

exports.insertCand = (req, res) => {
	let json = req.body;

	let arr = [json.candidatoID, json.nomeCand, json.partidoID, json.passCand];

	console.log(arr);

	db.insertCandidate(arr);
	res.send("Insert method");
};

exports.selectAllCand = (req, res) => {
	db.selectAllCandidates(() => {
		let allCandsJson = fs.readFileSync('./model/allCandidatos.json', 'utf-8');
		let conv = JSON.parse(allCandsJson || "[]");

		res.send(conv);
	});
};

exports.selectCand = (req, res) => {
	db.selectCandidate(req.body.candID, (result) => {
		res.send(result);
	});
};

exports.updateCand = (req, res) => {
	let json = req.body;
	let arr = [json.columnValue, json.candID];

	db.updateCandidate(arr);
	res.send("Update Method");
};

exports.deleteCand = (req, res) => {
	let id = req.body.candID;

	console.log("delete>id: ", id);
	db.deleteCandidate(id);
	res.send("Delete Method");
};

