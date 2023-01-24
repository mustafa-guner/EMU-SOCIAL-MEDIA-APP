const nodemailer = require("nodemailer");

const sendEmailToClient = async(emailDetails) => {
    const { SMTP_HOST, SMTP_PORT } = process.env;
    let transporter = nodemailer.createTransport({
        host: SMTP_HOST, // it was smtp.ethereal.email at first but changed it to gmail.com fro gmail usecases
        port: SMTP_PORT,
        secure: false, // true for 465, false for other ports
    });
    await transporter.sendMail({...emailDetails });
    console.log(`Email has sent to ${emailDetails.to} successfully.`);
};

module.exports = {
    sendActivationConfirmEmail: async(user) => {
        const { FROM_EMAIL, FROM_MAIL_PWD } = process.env;
        await sendEmailToClient({
            from: FROM_EMAIL, // sender address
            to: user.email, // list of receivers
            subject: "Account Activation Confirmation", // Subject line
            text: `Hi,${user.firstname}!\n We are happy to announce that your account has been activated. It's good to see you on our website.`, // plain text body
            auth: {
                user: FROM_EMAIL,
                pass: FROM_MAIL_PWD,
            },
        });
    },
};