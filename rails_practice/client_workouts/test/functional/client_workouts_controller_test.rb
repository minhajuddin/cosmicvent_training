require File.dirname(__FILE__) + '/../test_helper'

class ClientWorkoutsControllerTest < ActionController::TestCase
  def test_should_get_index
    get :index
    assert_response :success
    assert_not_nil assigns(:client_workouts)
  end

  def test_should_get_new
    get :new
    assert_response :success
  end

  def test_should_create_client_workout
    assert_difference('ClientWorkout.count') do
      post :create, :client_workout => { }
    end

    assert_redirected_to client_workout_path(assigns(:client_workout))
  end

  def test_should_show_client_workout
    get :show, :id => client_workouts(:one).id
    assert_response :success
  end

  def test_should_get_edit
    get :edit, :id => client_workouts(:one).id
    assert_response :success
  end

  def test_should_update_client_workout
    put :update, :id => client_workouts(:one).id, :client_workout => { }
    assert_redirected_to client_workout_path(assigns(:client_workout))
  end

  def test_should_destroy_client_workout
    assert_difference('ClientWorkout.count', -1) do
      delete :destroy, :id => client_workouts(:one).id
    end

    assert_redirected_to client_workouts_path
  end
end
