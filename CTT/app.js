const mysql = require('mysql');
// const file2 = require('../js/count_fond.js');
const conn = mysql.createConnection({
    host: "localhost",
	user: "root",
	database: "diplom",
    password: ""
});

conn.connect(err=>{
    if(err){
        console.log(err);
        return err;
        
    }else{
        console.log("Connect");
    }
}
);

let query  = "SELECT * FROM user";
conn.query(query, (err, result, field) =>{
    console.log(err);
    console.log(result);
})

conn.end(err=>{
    if(err){
        console.log(err);
        return err;
        
    }else{
        console.log("Close");
    }
}
);
document.getElementById('sendDataBtn').addEventListener('click', () => {
    const sum = 10;
    console.log(sum);
});

   