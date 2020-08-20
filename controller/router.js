const express = require('express');
const parser = require('body-parser');
const partCtrl = require('./partidoController.js');
const candCtrl = require('./candidatoController.js');
const auth = require('./auth.js');
const vote = require('./vote.js');

let app = express();

app.use(parser.json());

app.get('/', (req, res) => {
	res.send('home page');
});

app.get('/vote/auth', (req, res) => {
	res.send('autenticar eleitor');
});

app.get('/login', (req, res) => {
	res.send('login page');
});

app.get('/candidate/new', (req, res) => {
	res.send('cadastro');
});

app.get('/candidate', (req, res) => {
	res.send('personal page candidato');
});

app.post('/candidate/new', candCtrl.insertCand);

app.post('/candidate', candCtrl.selectCand);

app.patch('/candidate', candCtrl.updateCand);

app.delete('/candidate', candCtrl.deleteCand);

app.get('/vote/candidates', candCtrl.selectAllCand);

app.get('/parties', partCtrl.selectPartidos);

app.post('/login', auth.authCand);

app.post('/auth', auth.authVoter);

app.patch('/vote', vote.vote);

app.listen(3000, () => {
	console.log('Server running at localhost:3000')
});
