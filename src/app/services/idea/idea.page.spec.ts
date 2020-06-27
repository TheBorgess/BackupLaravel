import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { IdeaPage } from './idea.page';

describe('IdeaPage', () => {
  let component: IdeaPage;
  let fixture: ComponentFixture<IdeaPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ IdeaPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(IdeaPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
