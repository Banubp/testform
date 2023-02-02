const sendgrid = require("@sendgrid/mail");

document.getElementById("contact-form").addEventListener("submit", function(event) {
  event.preventDefault();

  const form = event.target;
  const name = form.elements.name.value;
  const email = form.elements.email.value;
  const subject = form.elements.subject.value;
  const message = form.elements.message.value;

  sendgrid.setApiKey("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");
  const msg = {
    to: "roadm4p@gmail.com",
    from: email,
    subject: subject,
    text: message,
    html: `<p>Name: ${name}</p><p>Email: ${email}</p><p>Message: ${message}</p>`,
  };
  sendgrid.send(msg);
});
