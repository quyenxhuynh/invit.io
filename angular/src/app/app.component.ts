import { Component } from '@angular/core';
import { Report } from './report';
import { ReportService } from './report.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'angular';

  constructor(private reportService: ReportService) { }

  reportModel = new Report('', '', [], '');

  option = ['Site Feedback', 'Bug Found', 'Other']

  confirm_msg = '';

  confirmReport(data: any): void {
    console.log(data);
    this.confirm_msg = "Feedback sent! If necessary, we will contact you at " + data.email + " for further details.";
  }

  onSubmit(form: any): void {
    let params = JSON.stringify(form);
    this.reportService.sendReport(params)
      .subscribe((data) => {
        this.reportModel = data;
      }, (error) => {
        console.log('Error', error);
      })
  }
}
