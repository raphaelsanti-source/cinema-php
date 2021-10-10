async function init() {
    const movie_id = document.getElementById('reserve').getAttribute('movie_id');
    const user_id = document.getElementById('reserve').getAttribute('user_id');
    const data = await fetch('http://localhost/kino/backend/get_tickets.php').then((response) => { return response.json() });
    const root = document.getElementById('seats');
    let tickets = [];
    let seat = 1;
    let seats = [];
    for (let i = 0; i < 15; i++) {
        seats[i] = [];
        for (let j = 0; j < 20; j++) {
            seats[i][j] = {
                id: seat,
                element: document.createElement('div'),
                taken: false,
                chosen: false
            }
            for (let x = 0; x < data.length; x++) {
                if (seat == data[x].seat && movie_id == data[x].movie) {
                    seats[i][j].taken = true
                }
            }
            if (seats[i][j].taken) {
                seats[i][j].element.style.backgroundColor = 'red';
            } else {
                seats[i][j].element.addEventListener('click', (e) => {
                    if (seats[i][j].chosen) {
                        e.target.style.backgroundColor = 'green';
                        seats[i][j].chosen = false;
                    } else {
                        e.target.style.backgroundColor = 'yellow';
                        seats[i][j].chosen = true;
                    }
                    tickets = [];
                    for (let x = 0; x < 15; x++) {
                        for (let y = 0; y < 20; y++) {
                            if (seats[x][y].chosen) {
                                tickets[tickets.length] = {
                                    user_id: user_id,
                                    movie_id: movie_id,
                                    seat: seats[x][y].id
                                }
                            }
                        }
                    }
                    console.log(tickets)
                });
                seats[i][j].element.style.backgroundColor = 'green';
            }
            seats[i][j].element.className = "seat";
            root.appendChild(seats[i][j].element);
            seat++;
        }
    }
    document.getElementById('rsv-btn').addEventListener('click', () => {
        fetch('http://localhost/kino/backend/add_ticket.php', {
            method: 'POST',
            body: JSON.stringify(tickets)
        }).then(response => console.log(response));
    });
}
init();