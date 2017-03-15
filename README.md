# midfp - Mail Message-ID Fingerprinting (German)

Mit dem _browserrecon project_ wurde eine der ersten umfassenden Implementierungen entwickelt, die mittels Application Fingerprinting eine eingesetzte Client-Applikation – in diesem Fall Webbrowser – erkennen können soll. Wir sind um eine Weiterführung dieses Ansatzes bezüglich anderen Clients bemüht.

Zum Beispiel können SMTP-Header, jedenfalls einige davon, um den Mailclient des Absenders zu identifizieren. Im Rahmen dieses SMTP Client Fingerprinting haben wir mitunter statistische Analysen zur Charakterisierung der Message-Id eingesetzt. Diese Zeile wurde erstmals in _RFC 724 – Proposed Official Standard for the Format of ARPA Network Messages erwähnt_ (Seite 24):

> This field contains a unique identifier (the <phrase>) to refer to this version of this message. The uniqueness of the message identifier is guaranteed by each host. This identifier is intended to be machine readable, and not necessarily meaningful to humans. A message-id pertains to exactly one instantiation of a particular message; subsequent revisions to the message should receive new message-id’s.

Wie eine solche eindeutige Message-Id generiert wird, ist dem Client überlassen. Sodann verwundert es nicht, dass sich hier je nach Implementierung unterschiedliche Charakteristiken ausmachen lassen. Unsere Untersuchungen haben wir mit einem Skript realisiert, welches die lokalen Folder einer Thunderbird-Installation durchgeht und aus den Headern der jeweiligen Mails die Zeile “Message-Id” (und zur Querprüfung die Zeile “X-Mailer”) ausliest. 
