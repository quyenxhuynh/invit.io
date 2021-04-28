export class Report {
    // name: string | null;
    // email: string | null;
    // option: string[] | null;
    // message: string | null;

    // constructor (name: string, email: string, option:string[], message:string) {
        // this.name = name;
        // this.email = email;
        // this.option = option;
        // this.message = message;
    // }

    constructor (
        public name: string, 
        public email: string, 
        public option:string[] | null, 
        public message:string) { }
}