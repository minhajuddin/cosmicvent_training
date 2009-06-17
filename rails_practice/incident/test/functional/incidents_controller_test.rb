require File.dirname(__FILE__) + '/../test_helper'

class IncidentsControllerTest < ActionController::TestCase
  def test_should_get_index
    get :index
    assert_response :success
    assert_not_nil assigns(:incidents)
  end

  def test_should_get_new
    get :new
    assert_response :success
  end

  def test_should_create_incident
    assert_difference('Incident.count') do
      post :create, :incident => { }
    end

    assert_redirected_to incident_path(assigns(:incident))
  end

  def test_should_show_incident
    get :show, :id => incidents(:one).id
    assert_response :success
  end

  def test_should_get_edit
    get :edit, :id => incidents(:one).id
    assert_response :success
  end

  def test_should_update_incident
    put :update, :id => incidents(:one).id, :incident => { }
    assert_redirected_to incident_path(assigns(:incident))
  end

  def test_should_destroy_incident
    assert_difference('Incident.count', -1) do
      delete :destroy, :id => incidents(:one).id
    end

    assert_redirected_to incidents_path
  end
end
