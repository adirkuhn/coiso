from flask import Flask, request
import time
import datetime
app = Flask(__name__)


def parse_log(line, user):
    if ("userid=" + user + "\n" in line):
        str_date = line[20:40]
        return int(time.mktime(datetime.datetime.strptime(str_date, "%d/%b/%Y:%H:%M:%S").timetuple()))

    return False

@app.route("/")
def index():
    #get user
    user = request.args.get("user", "user2")

    #server list
    servers = (
        'server1/server.log',
        'server2/server.log',
        'server3/server.log',
        'server4/server.log'
    )

    #parse files
    log_out = {}
    keys = []
    for log in servers:
        log_file = open('server1/server.log', 'rb')
        for line in log_file:
            ts = parse_log(line, user)
            if (ts != False):
                keys.append(ts)
                log_out[str(ts)] = line

    #out
    out = "<pre>"
    keys.sort()
    for k in keys:
        out += log_out[str(k)] + "<br>"

    return out


if __name__ == "__main__":
    app.run(debug=False)