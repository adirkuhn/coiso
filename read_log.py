from flask import Flask, request
app = Flask(__name__)




@app.route("/")
def read_log():
    servers = (
        'server1/server.log',
        'server2/server.log',
        'server3/server.log',
        'server4/server.log'
    )

    file = open('server1/server.log', 'rb')

    log = [];
    for line in file:
        log.append(line)

    print log

    user = request.args.get("user", "user2")
    return "Hello World " + user


if __name__ == "__main__":
    app.run(debug=True)