const axios = require('axios');
const cron = require("croner");
cron("1/10 * * * * *", () => {
    axios
    .get('http://localhost:8084/xu-ly-minigame')
    .then(res => {
      console.log(`statusCode: ${res.status}`);
      console.log(res.data);
    })
    .catch(error => {
      console.error(error.message);
    });
    //console.log('res');
});


cron("6/10 * * * * *", () => {
    axios
    .get('http://localhost:8084/xu-ly-pay')
    .then(res => {
      console.log(`statusCode: ${res.status}`);
      console.log(res.data);
    })
    .catch(error => {
      console.error(error.message);
    });
    //console.log('res');
});


// cron("10/20 * * * * *", () => {
//     axios
//     .get('http://localhost:8084/xu-ly-day-mission')
//     .then(res => {
//       console.log(`statusCode: ${res.status}`);
//       console.log(res.data);
//     })
//     .catch(error => {
//       console.error(error.message);
//     });
//     //console.log('res');
// });


// cron("15/20 * * * * *", () => {
//     axios
//     .get('http://localhost:8084/diemdanh')
//     .then(res => {
//       console.log(`statusCode: ${res.status}`);
//       console.log(res.data);
//     })
//     .catch(error => {
//       console.error(error.message);
//     });
//     //console.log('res');
// });


cron('3 2 */1 * * *', () => {
    axios
    .get('http://localhost:8084/ref-token')
    .then(res => {
        console.log(`statusCode: ${res.status}`);
        console.log(res.data);
      })
      .catch(error => {
        console.error(error.message);
      });
});


// cron('*/5 * * * *', () => {
//     axios
//     .get('https://clmm.anyweb.buzz/xoa-gd')
//     .then(res => {
//         console.log(`statusCode: ${res.status}`);
//         console.log(res.data);
//       })
//       .catch(error => {
//         console.error(error.message);
//       });
// });

// cron('*/20 * * * * *', () => {
//     axios
//     .get('https://clmm.anyweb.buzz/diem-danh')
//     .then(res => {
//         console.log(`statusCode: ${res.status}`);
//         console.log(res.data);
//       })
//       .catch(error => {
//         console.error(error.message);
//       });
// });

// cron('*/5 * * * *', () => {
//     axios
//     .get('https://clmm.anyweb.buzz/bill-loi')
//     .then(res => {
//         console.log(`statusCode: ${res.status}`);
//         console.log(res.data);
//       })
//       .catch(error => {
//         console.error(error.message);
//       });
// });


// cron("*/20 * * * * *", () => {
//     axios
//     .get('https://clmm.anyweb.buzz/cron-fake')
//     .then(res => {
//       console.log(`statusCode: ${res.status}`);
//       console.log(res.data);
//     })
//     .catch(error => {
//       console.error(error.message);
//     });
//     //console.log('res');
// });
