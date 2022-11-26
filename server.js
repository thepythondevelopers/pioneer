const express = require('express');
const app = express();
const http = require('http');
const server = http.createServer(app);
const { Server } = require("socket.io");
//const io = new Server(server);

const io = require('socket.io')(server, {
  cors: {
    origin: '*',
  }
});
app.get('/', (req, res) => {
  res.send('<h1>Hello world</h1>');
});

    /*app.use(function(req, res, next) {
        res.header("Access-Control-Allow-Origin", "*");
        res.header("Access-Control-Allow-Headers", "X-Requested-With");
        res.header("Access-Control-Allow-Headers", "Content-Type");
        res.header("Access-Control-Allow-Methods", "PUT, GET, POST, DELETE, OPTIONS");
        next();
    });*/
/*io.on('connection', (socket) => {
  console.log('a user connected');
});*/
/*io.on('connection', (socket) => {
  console.log('a user connected');
  socket.on('disconnect', () => {
    console.log('user disconnected');
  });
});*/

/*io.on('connection', (socket) => {
  socket.on('chat message', (msg) => {
    console.log('message: ' + msg);
  });
});*/
io.on('connection', (socket) => {
  socket.on('chat message', (msg) => {
    io.emit('chat message', msg);
  });
  socket.on('notification', (msg) => {
    io.emit('notification', msg);
  });
  socket.on('job', (msg) => {
    io.emit('job', msg);
  });
  
});



 server.listen(3000, () => {
  console.log('listening on *:3000');
});
/*server.listen(3000);*/
console.log('Hello');