const body = document.querySelector("body")
    modeToggle = body.querySelector(".mode-toggle");
    sidebar = body.querySelector("nav");
    sidebarToggle = body.querySelector(".sidebar-toggle");

let getMode = localStorage.getItem("mode");
if(getMode && getMode ==="dark"){
    body.classList.toggle("dark");
}

let getStatus = localStorage.getItem("status");
if(getStatus && getStatus ==="close"){
    sidebar.classList.toggle("close");
}



modeToggle.addEventListener("click", () =>{
    body.classList.toggle("dark");
    if(body.classList.contains("dark")){
        localStorage.setItem("mode", "dark");
    }else{
        localStorage.setItem("mode", "light");
    }
});

sidebarToggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
    if(sidebar.classList.contains("close")){
        localStorage.setItem("status", "close");
    }else{
        localStorage.setItem("status", "open");
    }
})

const btnFilter = document.querySelector("#filter");
const filterOptions = document.querySelector(".dropdown-menu");
btnFilter.addEventListener("click", function (){
    filterOptions.classList.toggle("active");
})




        $('.owl-carousel').owlCarousel({
            margin: 10,
            nav: true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1100:{
                    items:3 
                },
                1440:{
                    items:4
                }
                
            }
        })
        
        // Function to generate random data for each line
        function generateRandomDataMonth() {
            var data = [];
            for (var i = 0; i < 12; i++) {
                data.push(Math.floor(Math.random() * 30000));
            }
            return data;
        }

        var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

        var data = {
            labels: months,
            datasets: [
                {
                    label: 'Đã Thanh Toán',
                    data: generateRandomDataMonth(),
                    borderColor: "#00B3FF",
                    backgroundColor: "#00B3FF",
                    fill: false,
                },
                {
                    label: 'Đang Giao',
                    data: generateRandomDataMonth(),
                    borderColor: "#00C58A",
                    backgroundColor: "#00C58A",
                    fill: false,
                },
                {
                    label: 'Chuẩn Bị',
                    data: generateRandomDataMonth(),
                    borderColor: "#ff813a",
                    backgroundColor: "#ff813a",
                    fill: false,
                }
            ]
        };

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: false,
                            text: 'Month'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        display: false,
                        title: {
                            display: false,
                            text: 'Earn'
                        }
                    }
                },
                elements: {
                    line: {
                        tension: 0.4, // Điều này điều chỉnh độ mịn của đường line
                        borderRadius: 5 // Điều này điều chỉnh độ bo tròn của đường line
                    }
                }
            },
            plugins: {
                roundRectangle: {
                    radius: 10 // Điều này điều chỉnh độ bo tròn tổng thể của biểu đồ
                }
            }
        });

        // Set up an interval to update the chart with new random data every 30 seconds
        setInterval(function () {
            data.datasets[0].data = generateRandomDataMonth();
            data.datasets[1].data = generateRandomDataMonth();
            data.datasets[2].data = generateRandomDataMonth();
            myChart.update(); // Update the chart with new data
        }, 30000);




        function generateRandomDataDate() {
            var data = [];
            for (var i = 0; i < 7; i++) {
                data.push(Math.floor(Math.random() * 500));
            }
            return data;
        }

        var dates = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];

        var data = {
            labels: dates,
            datasets: [
                {
                    label: 'Đã Thanh Toán',
                    data: generateRandomDataDate(),
                    borderColor: "#00B3FF",
                    backgroundColor: "#00B3FF",
                    fill: false,
                },
                {
                    label: 'Đang Giao',
                    data: generateRandomDataDate(),
                    borderColor: "#00C58A",
                    backgroundColor: "#00C58A",
                    fill: false,
                },
                {
                    label: 'Chuẩn Bị',
                    data: generateRandomDataDate(),
                    borderColor: "#ff813a",
                    backgroundColor: "#ff813a",
                    fill: false,
                }
            ]
        };

        var ctx2 = document.getElementById('myChart2').getContext('2d');
        var myChart = new Chart(ctx2, {
            type: 'line',
            data: data,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: false,
                            text: 'Date'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        display: false,
                        title: {
                            display: true,
                            text: 'Earn'
                        }
                    }
                },
                elements: {
                    line: {
                        tension: 0.4, // Điều này điều chỉnh độ mịn của đường line
                        borderRadius: 5 // Điều này điều chỉnh độ bo tròn của đường line
                    }
                }
            },
            plugins: {
                roundRectangle: {
                    radius: 10 // Điều này điều chỉnh độ bo tròn tổng thể của biểu đồ
                }
            }
        });

        // Set up an interval to update the chart with new random data every 30 seconds
        setInterval(function () {
            data.datasets[0].data = generateRandomDataDate();
            data.datasets[1].data = generateRandomDataDate();
            data.datasets[2].data = generateRandomDataDate();
            myChart.update(); // Update the chart with new data
        }, 30000);
        setInterval(function () {
            data.datasets[0].data = generateRandomDataMonth();
            data.datasets[1].data = generateRandomDataMonth();
            data.datasets[2].data = generateRandomDataMonth();
            myChart2.update(); // Update the chart with new data
        }, 30000);

        function generateRandomData() {
            return Math.floor(Math.random() * 100);
          }
        
          var data3 = {
            labels: ["Direct", "Social"],
            datasets: [
              {
                data: [generateRandomData(), generateRandomData()],
                backgroundColor: ["#00B3FF", "#FF6ACC"],
              },
            ],
          };
        
          var ctx3 = document.getElementById('myChart3').getContext('2d');
          var myChart3 = new Chart(ctx3, {
            type: 'doughnut', // You can use other chart types like 'bar', 'line', etc.
            data: data3,
            options: {
              responsive: true,
              maintainAspectRatio: false,
            },
          });



const menuButton = document.getElementById("menuButton");
const closeButton = document.getElementById("closeButton");
const overlay = document.querySelector(".overlay");

// Open the mobile menu
menuButton.addEventListener("click", function () {
    document.body.classList.add("nav-open");
});

// Close the mobile menu
closeButton.addEventListener("click", function () {
    document.body.classList.remove("nav-open");
});

// Close the mobile menu when clicking on a list item
const listItems = document.querySelectorAll(".navBarMobile_item ul li a");
listItems.forEach(function (item) {
    item.addEventListener("click", function () {
        document.body.classList.remove("nav-open");
    });
});

// Close the mobile menu when clicking on the overlay
overlay.addEventListener("click", function () {
    document.body.classList.remove("nav-open");
});

