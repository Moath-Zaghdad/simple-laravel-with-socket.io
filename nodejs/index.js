var Server = require('http').Server();

var io = require('socket.io')(Server);
const redis = require('redis');


const redisClient = redis.createClient({
    host: process.env.redis,
    port: 6379,
    retry_strategy: () => 1000
});


redisClient.on('message', (channel, message) => {
    message = JSON.parse(message);
    console.log('Message recevied: ', message);

    io.emit(channel + ':' + message.event, message.data);
});


redisClient.subscribe('presence-test-channel', () => {
    console.log('Redis: test-channel subscribed');
});
Server.listen(3030);
