import fetch from 'node-fetch';

const apiKey = '7a089ceadb3e1e9367a4a5f5d5e5a343';
const searchTerm = 'love';
const apiUrl = `https://api.musixmatch.com/ws/1.1/track.search?q=${searchTerm}&apikey=${apiKey}`;

fetch(apiUrl)
  .then(response => response.json())
  .then(data => {
    // Handle the response data here
    console.log(data);
  })
  .catch(error => {
    // Handle any errors that occur during the request
    console.error(error);
  });