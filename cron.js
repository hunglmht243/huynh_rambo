const axios = require('axios');
const cron = require("croner");
cron("*/20 * * * * *", () => {
    axios
    .get('http://localhost:3333/cron-fake')
    .then(res => {
      console.log(`statusCode: ${res.status}`);
      console.log(res.data);
    })
    .catch(error => {
      console.error(error.message);
    });
    //console.log('res');
});


cron('3 2 */1 * * *', () => {
    axios
    .get('http://localhost:3333/login')
    .then(res => {
        console.log(`statusCode: ${res.status}`);
        console.log(res.data);
      })
      .catch(error => {
        console.error(error.message);
      });
});


cron('3/10 * * * * *', () => {
    axios
    .get('http://localhost:3333/tt')
    .then(res => {
        console.log(`statusCode: ${res.status}`);
        console.log(res.data);
      })
      .catch(error => {
        console.error(error.message);
      });
});

cron('*/20 * * * * *', () => {
    axios
    .get('http://localhost:3333/diem-danh')
    .then(res => {
        console.log(`statusCode: ${res.status}`);
        console.log(res.data);
      })
      .catch(error => {
        console.error(error.message);
      });
});